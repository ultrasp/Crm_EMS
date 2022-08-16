<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\SaveTrait;
use App\Models\Payment;

class SubscribeController extends Controller{

    use SaveTrait;

	public function index(Builder $builder){
		// dd(new $this->itemClass());;
	    if (request()->ajax()) {
	        $dt = DataTables::of(Subscribe::with(['owner','clinic']));
            $dt->addColumn('fio_admin', function($subscribe) {
                return !empty($subscribe->owner) ? $subscribe->owner->name : '';
            })
            ->addColumn('clinic_name', function($subscribe) {
                return empty($subscribe->clinic) ? '' : $subscribe->clinic->name;
            })
            ->editColumn('created_at', function($subscribe) {
            	return date("d.m.Y",strtotime($subscribe->created_at));
            })
            ->editColumn('date_end', function($subscribe) {
            	return date("d.m.Y",strtotime($subscribe->date_end));
            })
            ->editColumn('status', function($subscribe) {
            	return $subscribe->getStatus();
            })
            ->addColumn('patient_count', function($subscribe) {
                return $subscribe->getPatientsCount();
            })
            ->addColumn('quota', function($subscribe) {
                return $subscribe->quota;
            })
            ->addColumn('action', function ( $item) {
                $html = '';
                $html .= ' <a class="btn btn-sm detail_btn  btn-elevate btn-icon d-flex mx-auto" style="background: #f2f3f8;"><i class="fas fa-chevron-circle-down"></i></a>';
                $html .= ' <a class="btn btn-sm add_doctor_btn formBtn btn-elevate btn-icon d-flex mx-auto" data-href="'.route('subscribe.doctor.form').'" data-title="'.__('Add doctor to subscribe').'" data-id="'.$item->id.'"><i class="fas fa-user"></i></a>';
                $html .= ' <a class="btn btn-sm add_doctor_btn formBtn btn-elevate btn-icon d-flex mx-auto" data-href="'.route('subscribe.users.list').'" data-title="'.__('Subscribe users').'" data-id="'.$item->id.'"><i class="fas fa-users"></i></a>';
                $html .= ' <a class="btn btn-sm size_quota formBtn btn-elevate btn-icon d-flex mx-auto" data-href="'.route('subscribe.quota.view').'" data-title="'.__('Size quota').'" data-id="'.$item->id.'"><i class="fas fa-file-alt"></i></a>';
                return $html;
            });
            return $dt->toJson();
	    }

	    $html = $builder
                ->columns(Subscribe::showColumns())
                ->parameters([
                    'language' => [
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.24/i18n/Russian.json')
                    ],
                ]);
        $title = 'Subscribes';
        $columns = Subscribe::showColumns();
	    return view('admin.subscribe.index',compact('html','title','columns'));
	}

	public function getPayments(Request $request){
	    if (request()->ajax()) {
	        $dt = DataTables::of(Payment::getSubPayments($request->id))
            ->addColumn('amount', function($payment) {
                return $payment->price * $payment->doctor_count;
            })
            ->editColumn('updated_at', function($payment) {
            	return date("d.m.Y",strtotime($payment->updated_at));
            });
            return $dt->toJson();
	    }

	}

    public function addDoctorForm(Request $request){
        $id = $request->id;
        return response()->json(['html'=>view('admin.subscribe.addDoctor',['id' =>$id])->render()]);
    }

    public function storeDocCount(Request $request){
        if (!(($validator = $this->validateRequest(null,[
            'id' => 'required',
            'doc_count' => 'required|numeric',
            'days_count' => 'required|numeric'
        ])) instanceof \Illuminate\Validation\Validator)) {
            return $validator;
        }
        Subscribe::addInvitesByAdmin($request->id, $request->doc_count,$request->days_count);
        return $this->createResponse();
    }


    public function getUsersForm(Request $request){
        $sub = Subscribe::where('id',$request->id)->first();
        $email_list = $sub->getAllEmailsList();
        return response()->json(['html'=>view('admin.subscribe.users',['sub' =>$sub,'email_list' => $email_list])->render()]);
    }

    public function getQuotaForm(Request $request){
        $sub = Subscribe::where('id',$request->id)->first();
        return response()->json(['html'=>view('admin.subscribe.quota',['sub' =>$sub])->render()]);
    }

    public function saveUsersForm(Request $request){
        // dd($request->input());
        Subscribe::changeUsersEndDate($request->input('invites'),$request->input('id'));
        return $this->createResponse();
    }

    public function saveSizeForm(Request $request){
        $sub = Subscribe::where('id',$request->id)->first();
        $sub->quota = $request->input('quota');
        $sub->save();
        return $this->createResponse();
    }

    



}
