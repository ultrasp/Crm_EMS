<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form043Details extends Model{

	const PAGE_DOC_WRITES = 'doc_writes';
	const PAGE_EPICREZ = 'epicrez';

    protected $fillable = ['patient_id','page_key','page_num'];

	public static function getItem($patient_id,$page_key,$page_num = 1){
		$form = self::firstOrNew([
			'patient_id' => $patient_id,
			'page_key' => $page_key,
			'page_num' => $page_num,
		]);
		return $form;
	}

	public function doctor(){
		return $this->belongsTo(User::class,'doctor_id')->where('role', User::ROLE_DOCTOR);
	}

	public static function saveForm043($patient_id,$request){
		$pages_count = self::saveDocWrites($patient_id,self::PAGE_DOC_WRITES,$request->field16,$request->field16dates);
		
		if($request->has('field17'))
			self::saveWithData($patient_id,self::PAGE_EPICREZ,$request->field17,$request->field17dates);
		return $pages_count;
	}

	public static function saveDocWrites($patient_id,$page_key,$array,$dates){
		$list = [];

		foreach ($array as $key => $value) {
			$keys = explode("_", $key);
			$pageNum = $keys[0];

			if(!isset($list[$pageNum]))
				$list[$pageNum] = [];//self::getItem($patient_id,$page_key,$pageNum);
			
			if(!isset($list[$pageNum]['text']))
				$list[$pageNum]['text'] = [];

			$list[$pageNum]['text']  = $value;
		}
		foreach ($dates as $key => $value) {
			$keys = explode("_", $key);
			$pageNum = $keys[0];
			$rowNum = $keys[1];

			if(!isset($list[$pageNum]))
				$list[$pageNum] = [];//self::getItem($patient_id,$page_key,$pageNum);

			if(!isset($list[$pageNum]['date']))
				$list[$pageNum]['date'] = [];

			$list[$pageNum]['date'][$rowNum]  = $value;
		}
		foreach ($list as $pageNum => $item) {
			$page = self::getItem($patient_id,$page_key,$pageNum);
			$page->text = isset($item['text']) ? $item['text'] : null;
			$page->date = isset($item['date']) ? json_encode($item['date']) : null;
			if(empty($page->id))
				$page->doctor_id = auth()->id();
			$page->save();
		}
		return empty($list) ? 1 : max(array_keys($list));
	}

	public static function saveWithData($patient_id,$page_key,$array,$dates){
		$list = [];

		foreach ($array as $key => $value) {
			$keys = explode("_", $key);
			$pageNum = count($keys) == 2 ? $keys[0] : 1;
			$rowNum = count($keys) == 2 ? $keys[1] : $keys[0];

			if(!isset($list[$pageNum]))
				$list[$pageNum] = [];//self::getItem($patient_id,$page_key,$pageNum);
			
			if(!isset($list[$pageNum]['text']))
				$list[$pageNum]['text'] = [];

			$list[$pageNum]['text'][$rowNum]  = $value;
		}
		foreach ($dates as $key => $value) {
			$keys = explode("_", $key);
			$pageNum = count($keys) == 2 ? $keys[0] : 1;
			$rowNum = count($keys) == 2 ? $keys[1] : $keys[0];

			if(!isset($list[$pageNum]))
				$list[$pageNum] = [];//self::getItem($patient_id,$page_key,$pageNum);

			if(!isset($list[$pageNum]['date']))
				$list[$pageNum]['date'] = [];

			$list[$pageNum]['date'][$rowNum]  = $value;
		}
		foreach ($list as $pageNum => $item) {
			$page = self::getItem($patient_id,$page_key,$pageNum);
			$page->text = isset($item['text']) ? json_encode($item['text']) : null;
			$page->date = isset($item['date']) ? json_encode($item['date']) : null;
			if(empty($page->id))
				$page->doctor_id = auth()->id();
			$page->save();
		}
		return empty($list) ? 1 : max(array_keys($list));
	}

	public static function getData($patient_id,$addEpicrez = true){
		$field16 = [];
		$field16dates = [];
		$field17 = [];
		$field17dates = [];
		$info = self::where(['patient_id'=>$patient_id,'page_key' => self::PAGE_DOC_WRITES])->orderBy('page_num')->get();
		$doctors = [];
		foreach ($info as $key => $pageI) {
			if(!empty($pageI->text)){
				$field16[$pageI->page_num] = $pageI->text; 		
			}
			$doctor = $pageI->doctor;
			$doctors[$pageI->page_num] = [
				'id' => !empty($doctor) ? $doctor->id : '0',
				'fullname' => !empty($doctor) ? $doctor->fullname2 : '',
				// 'avatar' => !empty($doctor) && !empty($doctor->avatar) ? $doctor->avatar : '',
				'avatar' => !empty($doctor) && !empty($doctor->sign_image) ? $doctor->sign_image : '',
			];
			// dd($pageI->doctor);
			if(!empty($pageI->date)){
				$textrows = json_decode($pageI->date,true);
				foreach ($textrows as $key => $value) {
					$field16dates[$pageI->page_num.'_'.$key] = $value; 		
				}
			}
		}
		$pages = $info->pluck('page_num');
		// dd($field16);

		$result = [
			'field16' => (object)$field16,
			'field16dates' => (object)$field16dates,
			'doctors' => (object)$doctors,
			'pages' => $pages
		];

		if($addEpicrez){
			$info = self::where(['patient_id'=>$patient_id,'page_key' => self::PAGE_EPICREZ])->first();
			$result['field17'] = !empty($info) ?  (object)json_decode($info->text) : '';
			$result['field17dates'] = !empty($info) ?  (object)json_decode($info->date) : '';
		}

		return $result;
	}

	public static function removeDoctorPage($patient_id,$page_num){
		self::where(['patient_id' => $patient_id,'page_num' => $page_num,'page_key' =>self::PAGE_DOC_WRITES])->delete();
		Form025Conclusions::where(['patient_id' => $patient_id,'page_num' => $page_num])->delete();
	}
}
