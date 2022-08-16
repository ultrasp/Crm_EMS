<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	const STATUS_INIT = 'init';
	const STATUS_PAYED = 'payed';

    public function rateplan()
    {
        return $this->belongsTo(RatePlan::class,'rate_plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function promocode()
    {
        return $this->belongsTo(PromoCode::class,'promo_code_id');
    }

	public static function make($user_id, $price,$doctor_count, $rate_plan_id,$gateway,$payed_days,$promo_code_id = 0){
		$item = new self();
		$item->user_id = $user_id;
		$item->price = $price;
		$item->doctor_count = $doctor_count;
		$item->rate_plan_id = $rate_plan_id;
		$item->promo_code_id = $promo_code_id;
		$item->gateway = $gateway;
		$item->status = self::STATUS_INIT;
        $item->payed_days = $payed_days;
		return $item;
	}



	public function activate(){
		$this->status = self::STATUS_PAYED;
		return $this;
    }

    public function isPayed(){
        return $this->status == self::STATUS_PAYED;
    }

    public function subscribe($data){
		\DB::transaction(function () use ($data) {
	        if(empty($this->user->subscriber_id)){
	        	$this->createSubscribe();
	        }else{
				$this->editSubscribe();            
	        }
	        $this->details = $data;
	        $this->status = self::STATUS_PAYED;
	        $this->save();
		});
    }

    public function createSubscribe(){
	        
        $user = $this->user;
        $ratePlan = $this->rateplan;
    	$date_end = date('Y-m-d',strtotime("+".$ratePlan->period_count." days"));

        $sub = Subscribe::makeNew($user->specialization, $user->id ,$date_end, 1, $this->doctor_count - 1);

        InviteCode::makeInvite($sub->id,User::ROLE_OWNER,$date_end,$ratePlan->period_count,$user->email,$user->id);

        $this->makeInvites($sub->id,1,User::ROLE_MANAGER,$date_end,$ratePlan->period_count);
        $this->makeInvites($sub->id,$this->doctor_count - 1,User::ROLE_DOCTOR,$date_end,$ratePlan->period_count);
        
        Clinic::makeNew($sub->id);

        $user->initSubscribe($sub->id,$date_end,User::ROLE_OWNER);

        $this->removePromoCode();
    }

    public function editSubscribe(){
	        
        $user = $this->user;
        $ratePlan = $this->rateplan;

		$sub = $user->subscriber;
    	$date_end = date('Y-m-d',strtotime("+".$ratePlan->period_count." days"));

        if(!empty($this->users_id)){
        	$ids = json_decode($this->users_id,true);
            $invites = InviteCode::whereIn('id',$ids)->get();
            $max_end_date = $sub->date_end;
            foreach ($invites as $key => $invite) {
                $invite->setEndDate($date_end,$ratePlan->period_count);
                if(strtotime($max_end_date) < strtotime($invite->end_date))
                    $max_end_date = $invite->end_date;
                if($invite->role == User::ROLE_OWNER){
                    $invite->syncAdminsEndDate();
                }
            }
			$sub->editParam($max_end_date);
        }else{
			$sub->editParam($date_end,$this->doctor_count);
            //make new invites
            $this->makeInvites($sub->id,$this->doctor_count,User::ROLE_DOCTOR,$date_end,$ratePlan->period_count);
        }
        $this->removePromoCode();
    }

    public function removePromoCode(){
        if($this->promo_code_id != 0 ){
            $this->promocode->delete();
        }
    }

    public function makeInvites($sub_id,$count,$role,$date_end,$period_count){
        for ($i=0; $i < $count; $i++) { 
            InviteCode::makeInvite($sub_id,$role,$date_end,$period_count);
        }
    }

	public function saveData($data){
		$this->details = $data;
		$this->save();
	}

    public static function getSubPayments($sub_id){
        return self::whereExists(function ($query) use ($sub_id) {
                $query->select(\DB::raw(1))
                 ->from('users')
                 ->whereColumn('users.id', 'payments.user_id')
                 ->where('users.subscriber_id',$sub_id);
            })->where('status',self::STATUS_PAYED)->get();
    }

}
