<?php

namespace App\Http\Controllers;

use App\PaymentUtils\PaymentGateway;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Subscribe;
use App\Models\Form025Conclusions;
use App\Models\PatientFile;
use App\Models\Form043Details;
use DataTables;
use Illuminate\Validation\Rule;
use App\Http\Resources\Form025Resource;
use App\Models\DownloadPatientCard;
use App\Jobs\MakeZipPatientCards;

class PatientController extends Controller{

	public function list(){
        return DataTables::of(Subscribe::getSubPatients())
            ->editColumn('birthday', function (Patient $item) {
                return !empty($item->birthday) ? date('d.m.Y',strtotime($item->birthday)) : '';
            })
            ->addColumn('fullname', function (Patient $item) {
            	return $item->fullname;
            })
            ->addColumn('action', function (Patient $item) {
                $html = '';
                if(!auth()->user()->isDoctor()){
                    $html =  '<div class="d-flex align-items-center justify-content-center">';
                    $html .=  '<div class="d-inline align-items-center justify-content-center">
                                <button type="button" class="btn btn-secondary btn-radius-ico mx-1 btnPrint"  data-url="'.url(auth()->user()->isStomSpec() ? 'patients/form_043/'.$item->id.'/print' : 'patients/form_oftol/'.$item->id.'/print' ).'"><i class="fas fa-print btnPrint"></i></button>
                            </div>';
                    $html .=  '<div class="d-inline align-items-center justify-content-center">
                                <button type="button" class="btn btn-danger btn-radius-ico mx-1 btndelete"><i class="fas fa-trash"></i></button>
                            </div>';
                    $html .=  '<div class="d-inline align-items-center justify-content-center">
                                <button type="button" class="btn btn-primary btn-radius-ico mx-1 btnaccess"><i class="fas fa-user btnaccess"></i></button>
                            </div>';
                    $html .=  '</div>';

                }
                return $html;
            })
            ->filterColumn('fullname', function($query, $keyword) {
                $sql = "CONCAT_WS(' ',patients.name,patients.surname,patients.lastname)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->orderColumn('fullname', function ($query, $order) {
                // dd($order);
                $query->orderByRaw(' CONCAT(name,surname,lastname) '.$order );
            })
            ->rawColumns(['action'])
            ->toJson();
    }

	public function save(Request $request){
		$this->validate($request, [
            'lastname' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'card_number' => ['required','numeric',Rule::unique('patients')->where(function ($query) {
                    return $query->where('subscriber_id', auth()->user()->subscriber_id);
                })->ignore($request->id)
            ],
            // 'card_number' => 'required',
            'comment' => 'nullable'
        ]);

        User::register($request->input());
        return response()->json(['success'=> 1]);
    }

    public function delete(Request $request){
        return Patient::deleteItem($request->id);
    }

    public function attachDoctors(Request $request){
        // dd($request->input());
        $pat = Patient::where('id',$request->patientId)->first();
        $pat->attachDoctors($request->doctors_id);
        return response()->json(['message'=> __('Doctors Attached')]);
    }

    public function getSelDoctors($id){
        $patient = Patient::where('id',$id)->first();
        return response()->json([
            'selDoctors' => $patient->doctors->pluck('id')
        ]);
    }

    public function saveForm025(Request $request){
        $this->validate($request, [
            'clinic_address' => 'required',
            'clinic_name' => 'required',
            'clinic_kod_edropu' => 'required',
            'card_number' => ['required','numeric',Rule::unique('patients')->where(function ($query) {
                    return $query->where('subscriber_id', auth()->user()->subscriber_id);
                })->ignore($request->id)
            ],
            'name' => 'required',
        ]);
        $patient = Patient::saveForm025($request);
        return response()->json(['message'=> __('Data saved'),'id' => $patient->id]);
        // dd($request->input());
    }

    public function getPatientForm025($id){
        return  new Form025Resource(Patient::where('id',$id)->first());
    }

    public function getConclution(Request $request){
        $pat = Patient::where('id',$request->patientId)->first();
        $conclusion = Form025Conclusions::where([
                'patient_id' => $request->patientId,
                'page_num' => $request->pageNum
            ])->first();
        return response()->json([
            'conclution'=> $conclusion,
            'doctor' => $request->needPatient &&  !empty($conclusion->doctor)  ? $conclusion->doctor->fullname2 : '',
            'patient' => $request->needPatient ? $pat : null,
            'age' => $request->needPatient ? $pat->getAge() : ''
        ]);
    }

    public function storeConclution(Request $request){
        Form025Conclusions::saveItem($request->patientId,$request->pageNum,$request->input());
        return response()->json(['message'=> __('Data saved')]);
    }

    public function getFiles($id){
        return response()->json([
            'files' => PatientFile::where('patient_id',$id)
                ->orderBy('created_at','desc')
                ->get()->map(function($item){
                    $item->upload_url = $item->getUploadUrl();
                    $item->size = $item->formatSizeUnits();
                    return $item;
                })
            ]);
    }

    public function getQuotaInfo(){
        $sub = auth()->user()->subscriber;
        $used_space = round($sub->quota - $sub->usedSpace(),2);
        return response()->json([
            'used_space' => $used_space < 0 ? 0 : $used_space,
            'total_space' => $sub->quota
        ]);
    }

    public function storeFile(Request $request){
        $this->validate($request, [
            'file' => ['required','max:10000',function ($attribute, $value, $fail) {
                if (Subscribe::getFileSize(auth()->user()->subscriber_id) + $value->getSize()  >= auth()->user()->subscriber->quota /* config('subscribe.max_size')*/ * pow(10, 6)) {
                    $fail(__('Clinic file size reached'));
                }
            }],
            'patient_id' => 'required',
        ]);
        PatientFile::saveItem($request->file,$request->patient_id);
        return response()->json(['message'=> __('Data saved')]);
    }

    public function deleteFile(Request $request){
        $file = PatientFile::where('id',$request->id)->first();
        $file->remove();
        return response()->json(['message'=> __('File deleted')]);
    }

    public function removeDoctorPage(Request $request){
    	Form043Details::removeDoctorPage($request->patient_id, $request->page_num);
        return response()->json(['message'=> __('Doctor page deleted')]);
    }

    public function makeDownloadJob(Request $request){
        $newJob = DownloadPatientCard::makeNew($request->card_range);
        MakeZipPatientCards::dispatch($newJob);
        return response()->json(['message'=> __('Job added to queque')]);
    }
}
