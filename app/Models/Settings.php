<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Brotzka\DotenvEditor\DotenvEditor;
use Illuminate\Support\Facades\Cache;

class Settings extends Model{

	const GROUP_EMAIL = 'email';
	const GROUP_PAYMENT = 'payment';

    protected $fillable = ['name','value'];
	
	public $timestamps = false;
	public static function getItems(){
		return [
			[
				'key' => self::GROUP_EMAIL ,'label' => __('Email settings'),
				'children' => [
					['name' => 'MAIL_MAILER','label' => __('Mail sending type'),'type' => 'text'],
					['name' => 'MAIL_HOST','label' => __('Mail host'),'type' => 'text'],
					['name' => 'MAIL_PORT','label' => __('Mail port'),'type' => 'text'],
					['name' => 'MAIL_USERNAME','label' => __('Mail username'),'type' => 'text'],
					['name' => 'MAIL_PASSWORD','label' => __('Mail password'),'type' => 'text'],
					['name' => 'MAIL_ENCRYPTION','label' => __('Mail encryption'),'type' => 'text'],
					['name' => 'MAIL_FROM_ADDRESS','label' => __('Mail from address'),'type' => 'text'],
					['name' => 'MAIL_FROM_NAME','label' => __('Mail from name'),'type' => 'text'],
				]
			],	
			[
				'key' => self::GROUP_PAYMENT ,'label' => __('Payment settings'),
				'children' =>[
					['name' => 'IS_DEBUG_PAYMENT','label' => __('Is debug'),'type'=>'checkbox'],
				],
				'sub_groups' => [
					[
						'label' => __('Liqpay'),
						'children' => [
							['name' => 'LIQPAY_SECRET_KEY','label' => __('Secret key'),'type'=>'text'],
							['name' => 'LIQPAY_PUBLIC_KEY','label' => __('Public key'),'type'=>'text'],
						] 
					]
				]
			]		
		];
	}

	public static function getValues(){
		$list =  self::get()->pluck('value','name');
		$items = self::getItems();
		// $env = new DotenvEditor();
		// // dd($env->getValue('MAIL_MAILER'));
		// // dd($list);
		foreach ($items as $key => $item) {
			foreach ($item['children'] as $key => $child) {
				// $dbVal = $list->get($child['name']); 
				// try{
				// 	$list->put($child['name'],$env->getValue($child['name']) ); 	
				// }catch (\DotEnvException $e){
				// 	$list->put($child['name'],$dbVal);
				// }
				$list->put($child['name'],env($child['name'])); 	
			}
			if(isset($item['sub_groups'])){
				foreach ($item['sub_groups'] as $key => $sub) {
					foreach ($sub['children'] as $key => $child2) {
						// $dbVal = $list->get($child2['name']); 
						// try{
						// 	$list->put($child2['name'],$env->getValue($child2['name']) ); 	
						// }catch (\DotEnvException $e){
						// 	$list->put($child2['name'],$dbVal);
						// }
						$list->put($child2['name'],env($child2['name'])); 	
					}
				}
			}
		}
		// dd($list);
		return $list;
	}

	public static function getList(){
		// $seconds = '1000000';
		// return Cache::remember('conf', $seconds, function () {
		    return self::get()->pluck('value','name');
		// });
	}

	public static function saveValues($groups){
		// dd($groups);
	   	$env = new DotenvEditor();
	   	$data = [];
	   	$new = [];
		foreach ($groups as $name => $group) {
			foreach ($group as $item_name => $value) {
				$param = self::firstOrNew(['name' =>  $item_name,'group' =>$name]);
				$param->value = $value;
				$param->group = $name;
				$param->save();
				$value = strpos($value, ' ') === false ? $value : '"'.$value.'"';
				if($env->keyExists($item_name))
					$data[$item_name] = $value;
				else
					$new[$item_name] = $value;

			}
		}
		// dd($data);
		if(!empty($data)){
   			$env->changeEnv($data);
		}
		if(!empty($new)){
   			$env->addData($new);
		}
	    \Artisan::call('cache:clear');
	    \Artisan::call('config:clear');

		// Cache::forget('conf');
	}
}
