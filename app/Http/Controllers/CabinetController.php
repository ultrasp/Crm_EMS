<?php

namespace App\Http\Controllers;

use App\PaymentUtils\PaymentGateway;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Clinic;
use App\Models\Subscribe;
use App\Models\InviteCode;
use App\Models\FieldCategory;
use App\Models\FieldTemplate;
use App\Models\Document;
use App\Models\Form043;
use App\Models\Form043Details;
use App\Models\RatePlan;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Faq;
use App\Models\VideoInstruction;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Form043Resource;
use App\Http\Resources\Form025Resource;
use App\Models\DownloadPatientCard;

class CabinetController extends Controller{

	public function getProfile(){
        return response()->json(['user'=> auth()->user()]);
    }

    public function saveProfile(Request $request){
        $this->validate($request, [
            'nickname' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => ['required','email',Rule::unique('users')->ignore(auth()->id())],
            'password' => 'nullable',
            'signImage' => 'nullable|image',
            'avaImage' => 'nullable|image',
        ]);
        $data = $request->except(['_token','signImage','avaImage','password']);
        $user = auth()->user();
        $user->fill($data);
        $user->saveFile($request->signImage,'sign_image');
        $user->saveFile($request->avaImage,'avatar');
        if(!empty($request->password))
            $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['message'=> __('Profile updated'),'user' => $user]);
    }

    public function getClinic(){
    	return response()->json(['clinic'=>Clinic::getCurrentClinic(),'card_number' => Patient::getNewCardNumber()]);
    }

    public function saveClinic(Request $request){
        $this->validate($request, [
            'address' => 'required',
            'name' => 'required',
            'kod_edropu' => 'required|numeric|digits:8',
            'start_card_number' => 'nullable|numeric',
            'logo' => 'nullable|image',
        ]);
        $data = $request->except(['_token','logo']);
        $clinic = Clinic::getCurrentClinic();
        $clinic->fill($data);
        if(empty($clinic->start_card_number))
        $clinic->start_card_number = 1;

        $clinic->saveFile($request->logo,'logo');
        $clinic->save();
        return response()->json(['message'=> __('Clinic updated')]);
    }

    public function getSubInfo(){
    	$sub_id = auth()->user()->subscriber_id;
    	$sub = Subscribe::where('id',$sub_id)->first();
    	return response()->json([
    		'subscribe'=> $sub,
    		'email_list' => $sub->getAllEmailsList()
    	]);
    }

    public function saveInvites(Request $request){
        $this->validate($request, [
            'doc_invites' => 'array',
            'doc_invites.*.email' => [
                'nullable',
                'email',
                function ($attribute, $value, $fail)use($request) {
                    $attrs = explode(".", $attribute);
                    if($this->checkEmailDublicate($request,$value)){
                        $fail($value.' '.__('Duplicate email'));
                    }
                    if($this->checkEmailDublicateInDb($request->doc_invites[$attrs[1]]['id'],$value)){
                        $fail($value.' '.__('Email already in use'));
                    }
                    if (InviteCode::checkUserEmail($request->doc_invites[$attrs[1]]['user_id'] ,$value)) {
                        $fail($value.' '.__('Email is used.'));
                    }
                },
            ],
            'manage_invites' => 'array',
            'manage_invites.*.email' => [
                'nullable',
                'email',
                function ($attribute, $value, $fail)use($request) {
                    $attrs = explode(".", $attribute);
                    if($this->checkEmailDublicate($request,$value)){
                        $fail($value.' '.__('Duplicate email'));
                    }
                    if($this->checkEmailDublicateInDb($request->manage_invites[$attrs[1]]['id'],$value)){
                        $fail($value.' '.__('Email already in use'));
                    }
                    if (InviteCode::checkUserEmail($request->manage_invites[$attrs[1]]['user_id'] ,$value)) {
                        $fail($value.' '.__('Email is used.'));
                    }
                },

            ]
        ]);
        InviteCode::makeCodes(auth()->user()->subscriber_id,$request['doc_invites'],$request['manage_invites']);
        return response()->json(['message'=> __('Data saved')]);
    }

    public function checkEmailDublicate($request,$email){
        $count = 0;
        foreach ($request->doc_invites as $key => $value) {
            if( $value['email'] == $email )
                $count += 1;
            if( $count > 1 )
                return true;
        }

        foreach ($request->manage_invites as $key => $value) {
            if( $value['email'] == $email )
                $count += 1;
            if( $count > 1 )
                return true;
        }
        return false;
    }

    public function checkEmailDublicateInDb($invite_id,$email){
        return InviteCode::where('email',$email)->where('id','!=',$invite_id)->count() > 0;
    }

    public function sendEmail(Request $request){
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail)use($request) {
                    if($this->checkEmailDublicateInDb($request->id,$value)){
                        $fail($value.' '.__('Email already in use'));
                    }
                    if (InviteCode::checkUserEmail($request->id ,$value)) {
                        $fail($value.' '.__('Email is used.'));
                    }
                },
            ],
        ]);
    	$inv = InviteCode::where(['id' => $request->id,'subscriber_id'=>auth()->user()->subscriber_id])->first();
        $inv->changeEmail($request->email);
		$inv->notifyByEmail();
        return response()->json([
            'message' => __("Email notify sended")
        ]);
    }

    public function deleteInvite(Request $request){
        $inv = InviteCode::where('id',$request->id)->first();
        return response()->json($inv->removeItem());
    }

    public function getCategories(){
    	return response()->json([
    		'categories' => FieldCategory::select(['id','name'])
    			->where('specialization_id',auth()->user()->specialization)
                ->orderby('sort_number')
    			->get()
    	]);
    }

    public function getFieldTemplates(Request $request){
    	return response()->json([
    		'templates' => FieldTemplate::select(['id','name','full_description','subscriber_id'])
    			->where('field_category_id',$request->category_id)
    			->whereIn('subscriber_id',[0,auth()->user()->subscriber_id])
    			->orderBy('subscriber_id')
    			->get()
    		]);
    }

    public function getFieldTemplatesByCatSlug(Request $request){
        return response()->json([
            'templates' => FieldTemplate::select(['id','name','full_description'])
                ->whereExists(function ($query) use ($request) {
                   $query->select(DB::raw(1))
                        ->from('field_categories')
                        ->whereColumn('field_categories.id', 'field_templates.field_category_id')
                        ->where('key',$request->slug);
                })
                ->whereIn('subscriber_id',[0,auth()->user()->subscriber_id])
                ->orderBy('subscriber_id')
                ->get()
            ]);
    }

    public function saveTemplates(Request $request){
        $this->validate($request, [
            'templates' => 'array',
            'templates.*.name' => 'required',
            'templates.*.full_description' => 'required',
        ]);
     	FieldTemplate::saveTemplates($request->input());
        return response()->json(['message'=> __('Data saved')]);
    }

    public function getDocuments(Request $request){
        return response()->json([
            'documents' => Document::select(['id','name'])
                ->where('specialization_id',auth()->user()->specialization)
                ->orderBy('created_at','desc')
                ->get()
            ]);
    }

    public function download(Request $request){
        $doc = Document::where('id',$request->doc_id)->first();
        $patient = Patient::where('id',$request->patient_id)->first();
        $clinic = $patient->clinic;

        $path = public_path('uploads/'.$doc->file);
        $template = new \PhpOffice\PhpWord\TemplateProcessor($path);

        $template->setValue('patient_name', $patient->fullName);
        $template->setValue('patient_short_name', $patient->fullName2);
        $template->setValue('clinic_address', $clinic->address);
        $template->setValue('clinic_name', $clinic->name);
        $template->setValue('clinic_edropu_kod', $clinic->kod_edropu);
        if(!empty($clinic->logo) && is_file(public_path('uploads/'.$clinic->logo)))
            $template->setImageValue('clinic_logo', public_path('uploads/'.$clinic->logo));
        else
            $template->setValue('clinic_logo', '');

        $template->saveAs(public_path('temp.docx'));
        $filename = public_path('temp.docx');
        return response()->download($filename,$doc->name.".docx");
    }

    public function getPatient($id){
        return response()->json([
            'patient' => Patient::where('id',$id)
                ->first()
            ]);
    }

    public function savePatient(Request $request){
        $this->validate($request, [
            'clinic_address' => 'required',
            'clinic_name' => 'required',
            'clinic_kod_edropu' => 'required',
            'card_number' => ['required','numeric',Rule::unique('patients')->where(function ($query) {
                    return $query->where('subscriber_id', auth()->user()->subscriber_id);
                })->ignore($request->id)
            ],
            // 'card_number' => ['required','numeric',Rule::unique('patients')->ignore($request->id)],
            'doc_year' => 'nullable',
            'name' => 'required',
            'birthdate' => 'nullable',
            'gender' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
        ]);
        $patient = Patient::saveForm043($request);
        return response()->json(['message'=> __('Data saved'),'id' => $patient->id]);
        // dd($request->input());
    }

    public function savePatientCard(Request $request){
        // dd($request->input());
        $this->validate($request, [
            'card_number' => ['required','numeric',Rule::unique('patients')->where(function ($query) {
                    return $query->where('subscriber_id', auth()->user()->subscriber_id);
                })->ignore($request->id)
            ],
            // 'card_number' => 'required|numeric',
            'lastname' => 'required',
            'name' => 'required',
            'gender' => 'required',
        ]);
        Patient::saveCard($request);
        return response()->json(['message'=> __('Data saved')]);
    }

    public function getPatientForm043($id){
        return  new Form043Resource(Patient::where('id',$id)->first());
        // return response()->json([
        //     'patient' => Patient::where('id',$id)
        //         ->first(),
        //     'form043' => Form043::where('patient_id',$id),
        //     'rowdata' => Form043Details::getData($id)
        //     ]);
    }

    public function getPayments(){
        return response()->json([
            'payments' => Subscribe::getPayments(auth()->user()->subscriber_id)
        ]);
    }

    public function getDoctors(){
        $doctors = Subscribe::getDoctors(auth()->user()->subscriber_id)->map(function ($item) {
                $item->label = $item->fullname;
                return $item->only(['id','label']);
            })->all();
        return response()->json([
            'doctors' => $doctors
        ]);
    }

    public function getNotifications(){
        return response()->json([
            'notifications' => auth()->user()->unreadNotifications->take(2),
            'total' => auth()->user()->unreadNotifications->count()
        ]);
    }


    public function markNotification(Request $request){
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->json(['message'=>__('Marked as read')]);
    }

    public function addTicket(Request $request){
        $this->validate($request, Ticket::rules());
        Ticket::addItem($request->title,$request->question,$request->file);
        return response()->json(['message'=>__('Ticket added')]);
    }


    public function getFaqs(){
        return response()->json([
            'faqs' => Faq::get()
        ]);
    }

    public function getVideos(){
        return response()->json([
            'videos' => VideoInstruction::where('specialization_id',auth()->user()->subscriber->specialization_id)->get()
        ]);
    }

    public function testPDF043getPdf(Request $request){

        $id = 6;


            $pat  = new Form043Resource(Patient::where('id',$id)->first());
            $patient = $pat->toArray($request);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_043', compact('patient'))->setPaper('a5');
            return $pdf->setWarnings(false)->stream('invoice.pdf');


    }

    public function testPDF025getPdf(Request $request){
//        $type = 2;
        $id = 4;

//        if($type == 1){
//            $pat  = new Form043Resource(Patient::where('id',$id)->first());
//            $patient = $pat->toArray($request);
//            // dd($patient);
//            $pdf = \PDF::loadView('print.form_043', compact('patient'))->setPaper('a4', 'landscape');
//            return $pdf->setWarnings(false)->stream('invoice.pdf');
//        }else{
            $pat  = new Form025Resource(Patient::where('id',$id)->first());
            $patient = $pat->toArray($request);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_025', compact('patient'))->setPaper('a5');
            $pdf->save(public_path('invoice.pdf'));
            // Storage::put('public/pdf/', $pdf->output());
            return $pdf->setWarnings(false)->stream('invoice.pdf');
//        }
        // return view('print.form_043',compact('patient'));

    }

    public function getPdf(Request $request){
        $type = 2;
        $id = 6;

        if($type == 1){
            $pat  = new Form043Resource(Patient::where('id',$id)->first());
            $patient = $pat->toArray($request);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_043', compact('patient'))->setPaper('a5');
            return $pdf->setWarnings(false)->stream('invoice.pdf');
        }else{
            $pat  = new Form025Resource(Patient::where('id',$id)->first());
            $patient = $pat->toArray($request);
            // dd($patient);
            $pdf = \PDF::loadView('print.form_025', compact('patient'))->setPaper('a5');
            $pdf->save(public_path('invoice.pdf'));
            // Storage::put('public/pdf/', $pdf->output());
            return $pdf->setWarnings(false)->stream('invoice.pdf');
        }
        // return view('print.form_043',compact('patient'));

    }

    public function downloadZip($id){
        $d = DownloadPatientCard::where('id',$id)->first();
        if(is_file($d->getZipPath()) && empty($d->download_at)){
            // dd(is_file($d->getZipPath()));
            $d->downloaded();
            return response()->download($d->getZipPath())->deleteFileAfterSend(true);
        }else{
            return redirect()->back();
        }
    }
}
