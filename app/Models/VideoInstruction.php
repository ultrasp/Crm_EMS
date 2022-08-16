<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class VideoInstruction extends BaseModel
{
    use HasFactory;

    public $url_prefix = 'videoinstruction';
    public $show_action = true;
    public $single_item = 'VideoInstruction';
    public $multi_items = 'VideoInstructions';
    public $showDelete = true;

    const TYPE_VIDEO = 1;
    const TYPE_VIDEO_URL = 2;

    public $files = ['video'];

    public static function showColumns(){
    	return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'title', 'name' => 'title', 'title' => __('Title')],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
    	];
    }

    public static function rules(){
    	return [
    		'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'video' => [Rule::requiredIf(function ()  {
                return (request()->type == 1 &&  empty(request()->id));
            }),'file'],
            'video_url' => 'required_if:type,2',
            'specialization_id' => 'required'
    	];
    }

    public function formInputs(){
        return [
            ['name' => 'title','type'=>'text','title' => __('Title')],
            ['name' => 'description','type'=>'editor','title' => __('Description')],
            ['name' => 'type','type'=>'select','title' => __('Type'),'options'=>'getTypeList'],
            ['name' => 'video','type'=>'file','title' => __('Video')],
            ['name' => 'video_url','type'=>'textarea','title' => __('Video html from youtube')],
            ['name' => 'specialization_id','type'=>'select','title' => __('Specialization'),'options'=>'getSpecializationList'],
        ];
    }

    public function getTopButtons(){
        return [
            ['title' => __('Add'),'isAdd'=>true],
        ];
    }

    protected $fillable = ['title','description','type','video','video_url','specialization_id']; 

    public function getCreatdAt(){
        // dd($this->created_at);
        return date('d.m.Y',strtotime($this->created_at));
    }

    public function getTypeList(){
        return [
            self::TYPE_VIDEO => __('video file'),
            self::TYPE_VIDEO_URL => __('video url'),
        ];
    }

    public function getSpecializationList(){
        return Specialization::get()->pluck('name','id');
    }

}
