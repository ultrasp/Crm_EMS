<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldCategory extends BaseModel
{
    protected $fillable = ['name','specialization_id'];

    public $url_prefix = 'fieldcategory';
    public $show_action = true;
    public $single_item = 'FieldCategory';
    public $multi_items = 'FieldCategories';
    public $showDelete = true;

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'name', 'name' => 'name', 'title' => __('Title')],
            ['data' => 'specialization_id', 'name' => 'specialization_id', 'title' => __('Specialization'),'function'=>'getSpecializationTitle'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
        ];
    }

    public static function rules($item = null){
        return [
            'name' => 'required',
            'specialization_id' => 'required',
        ];
    }

    public function formInputs(){
        return [
            ['name' => 'name','type'=>'text','title' => __('Title')],
            ['name' => 'specialization_id','type'=>'select','title' => __('Specialization'),'options'=>'getSpecializationList'],
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

    public function remove(){
        FieldTemplate::where('field_category_id',$this->id)->delete();
        $this->delete();
    }
}
