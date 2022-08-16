<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Subscribe;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\InviteCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller{

	public function index(Request $request){

		$startTime = $request->has('start') ? $request->start : date('Y-m-d',strtotime(date('Y').'-01-01'));
		$endTime  = $request->has('end') ? $request->end : date('Y-m-t');
		$info = $this->getPeriods($startTime,$endTime);
		$periods = $info['periods'];
		$keyLabels = $info['keyLabels'];
		$subdata = $this->getSubData($startTime,$endTime,$periods);
		$patientData = $this->getPatientData($startTime,$endTime,$periods);
		$paymentData = $this->getPaymentData($startTime,$endTime,$periods);
		$unPayedUserData = $this->getUnpayedUserData($startTime,$endTime,$periods);

		// $start = date('d.m.Y',strtotime($startTime));
		// $end = date('d.m.Y',strtotime($endTime));
		// dd($start);
		// dd($paymentData);
	    return view('admin.index',compact('keyLabels','subdata','patientData','paymentData','unPayedUserData','startTime','endTime'));
	}

	public function getPeriods($start,$end){
		$periods = [];
		$keyLabels = [];
		$start    = (new \DateTime($start))->modify('first day of this month');
		$end      = (new \DateTime($end))->modify('first day of next month');
		$interval = \DateInterval::createFromDateString('1 month');
		$period   = new \DatePeriod($start, $interval, $end);

		foreach ($period as $dt) {
		    $periods[$dt->format("Y-m")] = 0;
		    $keyLabels[] = $dt->format("Y").' '.$this->getMonthName($dt->format("m"));
		}
		return ['periods' => $periods,'keyLabels'=> $keyLabels];
	}

	public function getMonthName($num){
	    $list = [
	    	1 => 'Січень',
	    	2=> 'Лютий',
	    	3=> 'Березень',
	    	4=> 'Квітень',
	    	5=> 'Травень',
	    	6=> 'Червень',
	    	7=> 'Липень',
	    	8=>'Серпень',
	    	9 => 'Вересень',
	    	10 => 'Жовтень',
	    	11=> 'Листопад',
	    	12 => 'Грудень'

	    	] ;
	    return $list[(int)$num];
	}

	public function getSubData($start,$end,$periods){
		$data = Subscribe::select(\DB::raw('count(0) total,Year(created_at) year, Month(created_at) month'))->whereBetween('created_at', [$start, $end])->groupByRaw('Year(created_at) ,Month(created_at)')->get();
		foreach ($data as $item) {
			$periods[$item->year .'-'.str_pad($item->month,2,"0",STR_PAD_LEFT)] = $item->total;
			# code...
		}
		return $periods;
	}

	public function getPatientData($start,$end,$periods){
		$data = Patient::select(\DB::raw('count(0) total,Year(created_at) year, Month(created_at) month'))->whereBetween('created_at', [$start, $end])->groupByRaw('Year(created_at) ,Month(created_at)')->get();
		// dd($data);
		foreach ($data as $item) {
			$periods[$item->year .'-'.str_pad($item->month,2,"0",STR_PAD_LEFT)] = $item->total;
		}
		return $periods;
	}

	public function getPaymentData($start,$end,$periods){
		$data = Payment::select(\DB::raw('sum(price * doctor_count) total,Year(updated_at) year, Month(updated_at) month'))
				->whereBetween('created_at', [$start, $end])
				->where('status',Payment::STATUS_PAYED)
				->groupByRaw('Year(updated_at) ,Month(updated_at)')->get();
		// dd($data);
		foreach ($data as $item) {
			$periods[$item->year .'-'.str_pad($item->month,2,"0",STR_PAD_LEFT)] = $item->total;
		}
		return $periods;
	}

	public function getUnpayedUserData($start,$end,$periods){
		$data = InviteCode::select(\DB::raw('count(0) total,Year(created_at) year, Month(created_at) month'))
				->whereBetween('created_at', [$start, $end])
				->whereNull('end_date')
				->groupByRaw('Year(created_at) ,Month(created_at)')->get();
		// dd($data);
		foreach ($data as $item) {
			$periods[$item->year .'-'.str_pad($item->month,2,"0",STR_PAD_LEFT)] = $item->total;
		}
		return $periods;
	}
}
