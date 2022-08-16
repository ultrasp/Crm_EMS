<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends BaseModel
{
    protected $fillable = ['name','file','specialization_id'];

    public $url_prefix = 'document';
    public $show_action = true;
    public $single_item = 'Document';
    public $multi_items = 'Documents';
    public $files = ['file'];
    public $showDelete = true;

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'name', 'name' => 'name', 'title' => __('Title')],
            ['data' => 'specialization_id', 'name' => 'specialization_id', 'title' => __('Specialization'),'function'=>'getSpecializationTitle'],
            ['data' => 'file', 'name' => 'file', 'title' => __('File'),'function'=>'getFileUrl'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
        ];
    }

    public static function rules($item = null){
        return [
            'name' => 'required',
            'specialization_id' => 'required',
            'file' => ( empty($item->id) ? 'required|': '') .'file|mimes:docx'
        ];
    }

    public function formInputs(){
        return [
            ['name' => 'name','type'=>'text','title' => __('Title')],
            ['name' => 'specialization_id','type'=>'select','title' => __('Specialization'),'options'=>'getSpecializationList'],
            ['name' => 'file','type'=>'file','title' => __('File')],
        ];
    }

    public function getTopButtons(){
        return [
            ['title' => __('Add'),'isAdd'=>true],
        ];
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class,'specialization_id');
    }

    public function getSpecializationTitle(){
        return $this->specialization->name;
    }

    public function getSpecializationList(){
        return Specialization::get()->pluck('name','id');
    }

    public function getFooter(){
        $list = [
            'patient_name' => 'ПІБ пацієнта',
            'patient_short_name' => 'ПІБ пацієнта з ініціалами',
            'clinic_address' => 'Адреса клініки',
            'clinic_name' => 'Назва клініки',
            'clinic_edropu_kod' => 'ЕДРПОУ   клініки',
            'clinic_logo' => 'Логотип клініки',
        ];
        $html = '<ul class="list-group">';
        foreach ($list as $key => $value) {
            $html .= '<li class="list-group-item">${'.$key.'} '.$value.'</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
