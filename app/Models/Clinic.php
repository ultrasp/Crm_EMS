<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model{

    protected $fillable = [
        'address',
        'name',
        'kod_edropu',
        'start_card_number',
        'specialization',
        'phone'
    ];

	public static function makeNew($sub_id){
		$clinic = new self();
		$clinic->subscriber_id = $sub_id; 
		$clinic->save();
	}

	public static function getCurrentClinic(){
		return self::where('subscriber_id',auth()->user()->subscriber_id)->firstOrFail();
	}

    public function saveFile($requestFile, $attr){
        if(empty($requestFile))
            return;
        
        $old_value = $this->$attr;

        $fileName = time().'.'.$requestFile->getClientOriginalExtension();
        $filePath = $requestFile->storeAs('', $fileName, 'public_uploads');
        $this->$attr = $filePath;

        if(!empty($old_value) && is_file(public_path('uploads/'.$old_value))){
            unlink(public_path('uploads/'.$old_value));
        }

    }
}
