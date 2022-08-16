<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RatePlan extends Model
{
    use SoftDeletes;

	const PERIOD_TYPE_DAY = 'day';
	const PERIOD_TYPE_WEEK = 'week';
	const PERIOD_TYPE_MONTH = 'month';
	const PERIOD_TYPE_YEAR = 'year';

    protected $fillable = ['currency_id','name','amount','period_count','period_type','is_active','has_coupon_code']; 

    public $url_prefix = 'rateplan';
    public $show_action = true;
    public $single_item = 'Rateplan';
    public $multi_items = 'Rateplans';
    public $showDelete = false;

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->period_type = 'day';
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'name', 'name' => 'name', 'title' => __('Title')],
            ['data' => 'description', 'name' => 'description', 'title' => __('Description')],
            ['data' => 'amount', 'name' => 'amount', 'title' => __('Price'),'function'=>'getAmount'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at'),'function'=>'getCreatdAt'],
        ];
    }

    public static function rules($item = null){
        return [
            'name' => 'required',
            'currency_id' => 'required',
            'amount' => 'required',
            'period_count' => 'required',
            'description' => 'nullable'
        ];
    }

    public function formInputs(){
        return [
            ['name' => 'name','type'=>'text','title' => __('Title')],
            ['name' => 'amount','type'=>'text','title' => __('Price')],
            ['name' => 'currency_id','type'=>'select','title' => __('Currency'),'options'=>'getCurrencyList'],
            ['name' => 'period_count','type'=>'text','title' => __('Period count')],
            ['name' => 'has_coupon_code','type'=>'checkbox','title' => __('Is coupon rate plan?')],
            ['name' => 'description','type'=>'textarea','title' => __('Description')],
            ['name' => 'is_active','type'=>'checkbox','title' => __('Is active')],
        ];
    }

    public function getTopButtons(){
        return [
            ['title' => __('Add'),'isAdd'=>true],
        ];
    }

    public function getAmount(){
        return $this->amount.$this->currency->iso_code;
    }

    public function getCurrencyList(){
        return Currency::get()->pluck('name','id');
    }

    public static function getList(){
        return RatePlan::active()->with('currency')->get();
    }
}
