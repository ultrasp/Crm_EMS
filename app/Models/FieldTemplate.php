<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldTemplate extends BaseModel
{
    use SoftDeletes;

    protected $fillable = ['name','full_description','field_category_id','subscriber_id'];

    public $url_prefix = 'fieldtemplate';
    public $show_action = true;
    public $single_item = 'FieldTemplate';
    public $multi_items = 'FieldTemplates';
    public $showDelete = true;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = !empty(auth()->user()) ? auth()->user()->id : auth()->guard('admin')->user()->id;
        });
    }

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'name', 'name' => 'name', 'title' => __('Title')],
            ['data' => 'full_description', 'name' => 'full_description', 'title' => __('Description')],
            ['data' => 'field_category_id', 'name' => 'field_category_id', 'title' => __('Category'),'function'=>'getCategoryName'],
            ['data' => 'subscriber_id', 'name' => 'subscriber_id', 'title' => __('Type'),'function'=>'getType'],
            ['data' => 'created_by', 'name' => 'created_by', 'title' => __('Creator'),'function'=>'getCreatorName'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
        ];
    }

    public static function rules($item = null){
        return [
            'name' => 'required',
            'full_description' => 'required',
            'field_category_id' => 'required',
            'subscriber_id' => 'nullable',
        ];
    }

    public function formInputs(){
        return [
            ['name' => 'name','type'=>'text','title' => __('Title')],
            ['name' => 'full_description','type'=>'textarea','title' => __('Description')],
            ['name' => 'field_category_id','type'=>'select','title' => __('Category'),'options'=>'getCategoryList'],
        ];
    }

    public function getTopButtons(){
        $list= 
         [
            ['title' => __('Add'),'isAdd'=>true],
        ];

        $cats = FieldCategory::get();
        foreach ($cats as $key => $cat) {
            $list[] = ['title' => $cat->name,'url'=>route('fieldtemplate.index',['cat' => $cat->id])];
        }
        return $list;
    }

    public function category()
    {
        return $this->belongsTo(FieldCategory::class,'field_category_id');
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscribe::class,'subscriber_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'created_by');
    }

    public function getCategoryName(){
        return $this->category->name;
    }

    public function getCategoryList(){
        return FieldCategory::get()->pluck('name','id');
    }

    public function getCreatorName(){
        return $this->subscriber_id == 0 ? (!empty($this->admin) ?  $this->admin->name : '') : $this->creator->name;
    }

    public function getType(){
        return $this->subscriber_id == 0 ? __('General') : __("Private"). ' ' . $this->subscriber->clinic->name;    
    }

    public static function saveTemplates($input){
        foreach ($input['templates'] as $key => $temp) {
            if(!isset($temp['subscriber_id']) || $temp['subscriber_id'] != 0){
                if($temp['id'] == 0)
                    self::makeUserTemplate($temp['name'],$temp['full_description'],$input['categoryId'],auth()->id(),auth()->user()->subscriber_id);
                else
                    self::updateItem($temp['id'],$temp['name'],$temp['full_description']);
            }
        }
        if(!empty($input['removeIds'])){
            $removes = self::whereIn('id',$input['removeIds'])->get();
            foreach ($removes as $key => $rem) {
                $rem->delete();
            }
        }
    }

    public static function updateItem($id,$name,$full_description){
        $template = self::where('id',$id)->first();
        $template->name = $name;
        $template->full_description = $full_description;
        $template->save();
    }

    public static function makeUserTemplate($name,$full_description,$field_category_id, $author_id,$sub_id = 0){
        $item = new self();
        $item->name = $name;
        $item->full_description = $full_description;
        $item->field_category_id = $field_category_id;
        $item->subscriber_id = $sub_id;
        $item->created_by = $author_id;
        $item->save();  
    }

    public static function getListQuery(){
        $cat_id = !empty(request()->cat) ? request()->cat : FieldCategory::first()->id;
        // dd(request()->exists('cat'));
        return self::where('field_category_id',$cat_id);
    }

    public  function getTitle(){
        $cat = !empty(request()->cat) ? FieldCategory::where('id',request()->cat)->first() : FieldCategory::first();
        // dd($this);
        return $cat->name.' '. __($this->multi_items);
    }
}
