<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form025Conclusions extends Model{

    protected $fillable = [
    	'patient_id',
    	'page_num',
    	'skargi',
    	'anamnez',
    	'visus_od',
    	'visus_od_kop',
        'visus_od_cyl',
        'visus_od_ax',
        'visus_od_equal',
        'visus_od_konyuktiv',
        'visus_od_rogivka',
        'visus_od_krishtalik',
        'visus_od_sklo',
        'visus_od_ochne',
        'visus_od_keratot',
        'visus_od_refrakt',
        'visus_os',
        'visus_os_sph',
        'visus_os_cyl',
        'visus_os_ax',
        'visus_os_equal',
        'visus_os_konyuktiv',
        'visus_os_rogivka',
        'visus_os_krishtalik',
        'visus_os_sklo',
        'visus_os_ochne',
        'visus_os_keratot',
        'visus_os_refrakt',
        'diagnoz',
        'priznan',
        'rekomend'
    ];

	public function doctor(){
		return $this->belongsTo(User::class,'doctor_id');
	}

	public static function saveItems($patient_id,$request){
		foreach ($request->conclusionlist as $key => $value) {
			self::saveItem($patient_id,$key,$value);
		}
	}

	public static function saveItem($patient_id,$pageNum,$data){
		$form = self::firstOrNew(['patient_id' => $patient_id,'page_num'=> $pageNum]);
		$form->fill($data);
		if(empty($form->id))
			$form->doctor_id = auth()->id();
		$form->save();
        $item = Form043Details::getItem($patient_id,Form043Details::PAGE_DOC_WRITES,$pageNum);
        $item->doctor_id = auth()->id();
        if(empty($item->id))
            $item->save();
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

    public static function getData($patient_id){
        $list = self::where('patient_id',$patient_id)->get();
        // ->except(['id','patient_id', 'doctor_id', 'created_at','updated_at']);
        $hasData = [];
        foreach ($list as $key => $item) {
            $cnt= count(array_filter($item->toArray()));
            // dd(array_filter($item->toArray()));
            if($cnt > 6)
                $hasData[$item['page_num']] = 1;
        }
        return $hasData;
    }
}
