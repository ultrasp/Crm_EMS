<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Patient extends Model{

	public function getFullnameAttribute(){
		return $this->lastname . ' ' .$this->name . ' '.$this->surname;
	}

	public function getFullname2Attribute(){
		return $this->lastname . ' ' .ucfirst(mb_substr($this->name, 0,1)) . '.'.ucfirst(mb_substr($this->surname,0,1)).'.';
	}

	public function clinic(){
		return $this->belongsTo(Clinic::class);
	}

	public function form043(){
		return $this->hasOne(Form043::class);
	}

	public function form025(){
		return $this->hasOne(Form025::class);
	}

	public function form043details(){
		return  $this->hasOne(Form043Details::class);
	}

	public function doctors()
    {
        return $this->belongsToMany(User::class, 'patient_doctors', 'patient_id', 'doctor_id');
    }


	public static function saveItem($request){
		$isNew = empty($request->id);
		$patient = $isNew ? new Patient() : Patient::where('id',$request->id)->first();
		$names = explode(" ", $request->name);
		$patient->lastname = isset($names[0]) ? $names[0] : null;
		$patient->name = isset($names[1]) ? $names[1] : null;
		$patient->surname = isset($names[2]) ? implode(' ', array_slice($names, 2)) : null;
		$patient->birthday =  $request->birthdate;
		$patient->phone =  $request->phone;
		$patient->address =  $request->address;
		$patient->gender =  $request->gender;
		$patient->card_number =  $request->card_number;
		$patient->clinic_id = auth()->user()->subscriber->clinic->id;
		$patient->doctor_id = auth()->id();
		$patient->subscriber_id = auth()->user()->subscriber_id;
		$patient->save();
		if($isNew){
			if(auth()->user()->isDoctor()){
				$patient->doctors()->attach(auth()->id());
			}
		}
		// dd($patient);
		return $patient;
	}

	public function getAge(){
		if(empty($this->birthday))
			return '';
		$date = new \DateTime($this->birthday);
		$now = new \DateTime();
		$interval = $now->diff($date);
		return $interval->y;
	}

	public static function saveForm043($request){
		return DB::transaction(function () use($request){
			$patient = self::saveItem($request);
			$f = Form043::saveItem($patient->id,$request);
			$page_count = Form043Details::saveForm043($patient->id,$request);
			$f->doc_write_count =$page_count; 
			$f->save();
			return $patient;
		});
	}

	public static function saveForm025($request){
		return DB::transaction(function () use($request){
			$patient = self::saveItem($request);
			$f = Form025::saveItem($patient->id,$request);
			$page_count = Form043Details::saveForm043($patient->id,$request);
			if(empty($request->id)){
				Form025Conclusions::saveItems($patient->id,$request);
			}
			$f->doc_write_count =$page_count; 
			$f->save();
			return $patient;
		});
	}

	public static function saveCard($request){
		$isNew = empty($request->id);
		$patient = $isNew ? new Patient() : Patient::where('id',$request->id)->first();
		$patient->lastname = $request->lastname;
		$patient->name = $request->name;
		$patient->surname = $request->surname;
		$patient->birthday =  $request->birthday;
		$patient->phone =  $request->phone;
		$patient->address =  $request->address;
		$patient->email =  $request->email;
		$patient->gender =  $request->gender;
		$patient->card_number =  $request->card_number;
		$patient->comment =  $request->comment;
		if($isNew){
			$patient->clinic_id = auth()->user()->subscriber->clinic->id;
			$patient->doctor_id = auth()->id();
			$patient->subscriber_id = auth()->user()->subscriber_id;
			if(auth()->user()->isDoctor()){
				$patient->doctors()->attach(auth()->id());
			}
		}
		$patient->save();
	}

	public static function deleteItem($patient_id){
		Form043::where('patient_id',$patient_id)->delete();
		Form043Details::where('patient_id',$patient_id)->delete();
		self::where('id',$patient_id)->delete();
	}

	public function attachDoctors($doctors_id){
		$this->doctors()->sync($doctors_id);
	}

	public static function getNewCardNumber(){
		$latest_number = Patient::where('subscriber_id',auth()->user()->subscriber_id)->max('card_number');
		if(empty($latest_number)){
			$clinic = Clinic::where('subscriber_id',auth()->user()->subscriber_id)->first();
			$latest_number = $clinic->start_card_number;
		}else{
			$latest_number += 1;
		}
		return $latest_number; 
	}
}
