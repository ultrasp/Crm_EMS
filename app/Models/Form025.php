<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form025 extends Model{

    protected $fillable = [
    	'patient_id',
    	'doc_year',
    	'field5',
    	'field6',
    	'field8text',
    	'field8',
        'field9',
        'field10',
        'field10text',
        'field11',
        'field11text',
        'blood',
        'rezus',
        'blood_transfusion',
        'diabet',
        'infection',
        'hirurgion',
        'allergy',
        'preparate',
        'factor_risk'
    ];

	public function doctor(){
		return $this->belongsTo(User::class,'doctor_id');
	}

	public static function saveItem($patient_id,$request){
		$form = self::firstOrNew(['patient_id' => $patient_id]);
		$form->fill($request->input());
		if(empty($form->id))
			$form->doctor_id = auth()->user()->isDoctor() ? auth()->id() : 0;
		$form->save();
		return $form; 
	}

	public function getDoctor(){
		if($this->doctor_id == 0)
			return null;
		$doc = $this->doctor;
		if(empty($doc)){
			return null;
		}else{
			return [
				'fullname' => $doc->fullname2,
				'avatar' => $doc->getAva()
			];
		}

	}
}
