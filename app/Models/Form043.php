<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form043 extends Model{

    protected $fillable = ['patient_id'];

	public static function saveItem($patient_id,$request){
		$form = self::firstOrNew(['patient_id' => $patient_id]);
		$form->doc_year = $request->doc_year; 
		$form->field5 =  $request->field5;
		$form->field6 =  $request->field6;
		$form->field7 =  $request->field7;
		$form->field71 =  $request->field71;
		$form->field72 =  $request->field72;
		$form->field73 =  $request->field73;
		$form->field74 =  $request->field74;
		$form->field75 =  $request->field75;
		$form->field76 =  $request->field76;
		$form->field77 =  $request->field77;
		$form->field78 =  $request->field78;
		$form->field79 =  $request->field79;
		$form->field80 =  $request->field80;
		$form->field81 =  $request->field81;
		$form->field82 =  $request->field82;
		$form->field8 =  $request->field8;
		$form->field9 =  $request->field9;
		$form->field9time =  json_encode($request->field9time);
		$form->field9table =  json_encode($request->field9table);
		$form->field10 =  $request->field10;
		$form->field11 =  $request->field11;
		$form->field12 =  $request->field12;
		$form->field13 =  $request->field13;
		$form->field14 =  $request->field14;
		$form->field15 =  $request->field15;
		$form->field15text =  $request->field15text;
		$form->field18 =  $request->field18;
		$form->field19 =  $request->field19;
		$form->save();
		return $form; 
	}
}
