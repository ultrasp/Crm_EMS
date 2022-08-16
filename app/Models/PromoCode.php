<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class PromoCode extends BaseModel
{
    protected $fillable = ['rate_plan_id','code','date_end','comment'];

    public $timestamps = false; 
    use SoftDeletes;

    public $url_prefix = 'promocode';
    public $show_action = true;
    public $single_item = 'Promocode';
    public $multi_items = 'Promocodes';
    public $showDelete = true;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
        	$model->created_by = auth()->guard('admin')->user()->id;
        });
    }

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'code', 'name' => 'code', 'title' => __('Code')],
            ['data' => 'comment','name'=>'comment','title' => __('Comment')],
            ['data' => 'date_end', 'name' => 'date_end', 'title' => __('Date end'),'function'=>'getFormatedDate'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
        ];
    }

    public static function rules($item = null){
        return [
            'code' => ['required',Rule::unique('promo_codes')->ignore($item->id)],
            'comment' => 'required',
            'date_end' => 'required|date',
        ];
    }

    public function formInputs(){
        return [
            ['name' => 'code','type'=>'text','title' => __('Code')],
            ['name' => 'date_end','type'=>'date','title' => __('Date end')],
            ['name' => 'comment','type'=>'textarea','title' => __('Comment')],
        ];
    }

    public function getTopButtons(){
        return [
            ['title' => __('Add'),'isAdd'=>true],
        ];
    }


    public static function checkIsActive($code,$rp_id){
        return self::where('code',$code)->where(function($query) {
                $query->whereNull('date_end')
                      ->orWhere('date_end', '>', date('Y-m-d'));
            })
            ->whereIn('rate_plan_id',[0,$rp_id])->first();
    }

}
