<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    public $url_prefix = 'faq';
    public $show_action = true;
    public $single_item = 'FAQ';
    public $multi_items = 'FAQ';
    public $showDelete = true;
    public $showEdit = true;

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
    	];
    }

    public function formInputs(){
        return [
            ['name' => 'title','type'=>'text','title' => __('Title')],
            ['name' => 'description','type'=>'editor','title' => __('Description')],
        ];
    }

    public function getTopButtons(){
        return [
            ['title' => __('Add'),'isAdd'=>true],
        ];
    }

    protected $fillable = ['title','description']; 

    public function getCreatdAt(){
        // dd($this->created_at);
        return date('d.m.Y',strtotime($this->created_at));
    }

}
