<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Notifications\UserInviteCode;
use Illuminate\Notifications\Notifiable;

class InviteCode extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['email','role','subscriber_id','code']; 

    public function subscriber()
    {
        return $this->belongsTo(Subscribe::class,'subscriber_id');
    }

    public static function makeCodes($sub_id, $doc_emails,$manage_emails){
    	foreach ($doc_emails as $key => $item) {
            if($item['id'] > 0 ){
                $inv = InviteCode::where(['id' => $item['id'],'subscriber_id' => $sub_id])->first();
                $inv->changeEmail($item['email']);
            }
            else {
                $inv = new InviteCode(['subscriber_id' => $sub_id,'role' => User::ROLE_DOCTOR,'email'=>$item['email']]);
                $inv->save();
            }
    	}
    	foreach ($manage_emails as $key => $item) {
            $inv = InviteCode::where(['id' => $item['id'],'subscriber_id' => $sub_id])->first();
            $inv->changeEmail($item['email']);
    	}
    }

    public function changeEmail($new_email){
        if($this->user_id == 0 ){
            $this->email = $new_email;
            $this->save();
        }

    }

    public static function makeInvite($sub_id, $role,$end_date,$payed_days =0,$email=null,$user_id = 0){
    	$item = new self();
    	$item->subscriber_id = $sub_id;
    	$item->role = $role;
        $item->end_date = $end_date;
    	$item->email = $email;
        $item->user_id = $user_id;
        $item->makeInvCode();
        $item->payed_days =$payed_days; 
    	$item->save();
    }

    public function makeInvCode(){
        // if(empty($item->code))
        //     return;
        for ($i=0; $i < 10; $i++) { 
            $code = Str::random(10);
            if(self::where('code',$code)->count() == 0)
                break;
        }
        $this->code  = $code ;
    }

    public function notifyByEmail(){
        $this->email_send_at = date('Y-m-d H:i:s');
        $this->makeInvCode();
        $this->save();
        $this->notify(new UserInviteCode($this));
    }

    public static function checkUserEmail($user_id,$email){
        return User::where('email',$email)->where('id','!=',$user_id)->where('status',User::STATUS_ACTIVATED)->count() > 0;
    }

    public function setEndDate($date_end,$payed_days = 0 ){
        if(empty($this->end_date)){
            $this->end_date = $date_end;
        }else{
            // dd(strtotime($this->end_date) < strtotime(date('Y-m-d')));
            if($payed_days == 0){
            // if(strtotime($this->end_date) < strtotime(date('Y-m-d')) ){
                $this->end_date = $date_end;
            }else{
                $this->end_date = date('Y-m-d',strtotime($this->end_date." +".$payed_days." days"));
            }
        }
        $this->payed_days = $payed_days == 0 ? $this->getDifDays($date_end) : $payed_days ;
        $this->save();
    }

    public function getDifDays($end_date){
        $now = strtotime(date('d-m-Y')); // or your date as well
        $your_date = strtotime($end_date);
        $datediff = $your_date - $now;

        return round($datediff / (60 * 60 * 24));
    }


    public function getTillEndDays(){
        $now = strtotime(date('d-m-Y')); // or your date as well
        $your_date = strtotime($this->end_date);
        $datediff = $your_date - $now;

        return round($datediff / (60 * 60 * 24));
    }

    public function clearInvCode(){
        $this->email = null;
        $this->email_send_at = null;
        $this->user_id = 0;
        $this->makeInvCode();
        $this->save();
        if($this->user_id > 0){
            $user = User::where('id',$this->user_id)->first();
            UserA::archive($user);
            $user->delete(); 
            // $user->subscriber_id = 0;
        }
    }

    public function removeItem(){
        // if($this->user_id == 0 || ($this->user_id > 0 && $this->payed_days >= 365) ) {
            $this->clearInvCode();
            return ['is_removed' => 1,'message' => __('Deleted success')]; 
        // }else{
        //     return ['is_removed' => 0,'message' => __('Could not delete user when sub day less than year')]; 
        // }
    }

    public function syncAdminsEndDate(){
        if($this->role != User::ROLE_OWNER)
            return;
        $admins = self::where('role',User::ROLE_MANAGER)->where('subscriber_id',$this->subscriber_id)->get();
        foreach ($admins as $key => $admin) {
            $admin->end_date = $this->end_date;
            $admin->payed_days = $this->payed_days;
            $admin->save();
        }
    }

    public function isManager(){
        return $this->role == User::ROLE_MANAGER;
    }

}
