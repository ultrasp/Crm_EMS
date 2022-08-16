<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribe extends Model
{
    use SoftDeletes;

    protected $fillable = ['owner_id','auto_write_off','specialization_id','quota']; 

    const STATUS_ACTIVE = 1;
    const STATUS_ACTIVE_BY_HAND = 2;
    const STATUS_BLOCKED = 3;
    const STATUS_EXPIRED = 4;

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function clinic()
    {
        return $this->hasOne(Clinic::class,'subscriber_id');
        // return $this->belongsTo(Clinic::class);
    }

    public static function showColumns(){
        return [
            ['data' => 'id', 'name' => 'id', 'title' => __('Id')],
            ['data' => 'fio_admin', 'name' => 'fio_admin', 'title' => __('Admin Fio')],
            ['data' => 'clinic_name', 'name' => 'clinic_name', 'title' => __('Clinic name')],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at')],
            ['data' => 'date_end', 'name' => 'date_end', 'title' => __('Date End')],
            ['data' => 'status', 'name' => 'status', 'title' => __('Status')],
            ['data' => 'patient_count', 'name' => 'patient_count', 'title' => __('Patients count')],
            ['data' => 'quota', 'name' => 'quota', 'title' => __('File quota/MB')],
            ['data' => 'action' ,'name'=>'action','title'=>'Action']
        ];
    }

    public static function makeNew($specialization_id, $user_id,$date_end,$manager_count,$doctor_count,$admin_count = 1){
        $item = new self();
        $item->owner_id = $user_id;
        $item->auto_write_off = 1;
        $item->admin_count =  $admin_count;
        $item->manager_count =  $manager_count;
        $item->doctor_count =  $doctor_count;
        $item->status = self::STATUS_ACTIVE;
        $item->date_end = $date_end;
        $item->specialization_id = $specialization_id;
        $item->save();
        return $item;
    }

    public function editParam($date_end, $count = 0, $type = 1){
        $this->date_end = $date_end;
        if($type == 1){
            $this->doctor_count += $count; 
        }else{
            $this->manager_count += $count; 
        }
        $this->save();
    }

    public function getAllEmailsList(){
        $collection = collect();
        $list = ['admins' => [],'managers'=>[],'doctors'=>[]];
        foreach ($this->getInvitesList() as $key => $invite) {
            if($invite->role == User::ROLE_MANAGER){
                $list['managers'][] = $invite;
            }elseif ($invite->role == User::ROLE_OWNER) {
                $list['admins'][] = $invite;
            }else{
                $list['doctors'][] = $invite;
            }
        }
        return $list;
    }

    public function getOwner(){
        return User::where(['subscriber_id' => $this->id,'role'=>User::ROLE_OWNER])->first();
    }

    public function getUsersList(){
        return User::where('subscriber_id',$this->id)->where('role','!=',User::ROLE_OWNER)->get();
    }

    public function getInvitesList(){
        return InviteCode::select(['id','email','role','end_date','user_id'])->where('subscriber_id',$this->id)->get();

    }

    public static function getStatuses(){
        return [
            self::STATUS_ACTIVE => __('active'),
            self::STATUS_ACTIVE_BY_HAND => __('activated by hand'),
            self::STATUS_BLOCKED => __('blocked'),
            self::STATUS_EXPIRED => __('expired'),
        ];
    }

    public function getStatus(){
        $list = self::getStatuses();
        return $list[$this->status];
    }

    public function getPatientsCount(){
        return Patient::whereExists(function ($query) {
            $query->select(\DB::raw(1))
             ->from('clinics')
             ->whereColumn('clinics.id', 'patients.clinic_id')
             ->where('clinics.subscriber_id',$this->id);
        })->count();

    }

    public static function getPayments($sub_id){
        return Payment::whereExists(function ($query)use($sub_id) {
               $query->select(\DB::raw(1))
                     ->from('users')
                     ->whereColumn('users.id', 'payments.user_id')
                     ->where('users.subscriber_id',$sub_id);
            })->with('rateplan')
            ->where('status',Payment::STATUS_PAYED)
            ->orderby('updated_at','desc')
            ->get()
            ->map(function($item){
                $item->pay_days = $item->rateplan->period_count;
                return $item;
            });
    }

    public static function getSubPatients(){
        $q = Patient::query();
        $q->where('subscriber_id',auth()->user()->subscriber_id);

        if(auth()->user()->isDoctor())
            $q->whereExists(function ($query) {
               $query->select(\DB::raw(1))
                     ->from('patient_doctors')
                     ->whereColumn('patient_doctors.patient_id', 'patients.id')
                     ->where('patient_doctors.doctor_id',auth()->id());
            });

        return $q;
    }

    public static function getDoctors($sub_id){
        return User::where('subscriber_id',$sub_id)
            ->where('role',User::ROLE_DOCTOR)
            ->whereExists(function ($query)use($sub_id) {
               $query->select(\DB::raw(1))
                     ->from('invite_codes')
                     ->whereColumn('invite_codes.user_id', 'users.id')
                     ->where('invite_codes.subscriber_id',$sub_id);
                     // ->where('end_date', '>', \DB::raw('NOW()'));
            })
            ->where('status',User::STATUS_ACTIVATED)
            ->get();
    }

    public function ediSubParam($date_end, $new_doctor_count){
        if(strtotime($this->date_end) < strtotime($date_end)){
            $this->date_end = $date_end;
        }
        $this->doctor_count += $new_doctor_count;
        $this->save();
    }

    public static function addInvitesByAdmin($sub_id,$doc_count,$day_count){
        $sub = Subscribe::where('id',$sub_id)->first();
        $date_end = date('Y-m-d',strtotime("+".$day_count." days"));
        for ($i=0; $i < $doc_count; $i++) { 
            InviteCode::makeInvite($sub->id,User::ROLE_DOCTOR,$date_end,$day_count);
        }
        $sub->ediSubParam($date_end,$doc_count);
    }

    public static function changeUsersEndDate($invite_list,$sub_id){
        $sub = Subscribe::where('id',$sub_id)->first();
        $invites = InviteCode::where('subscriber_id',$sub_id)->whereIn('id',array_keys($invite_list))->get()->keyBy('id');
        $max_date = 0; 
        foreach ($invite_list as $id => $row) {
            $inv = $invites->get($id);
            if($max_date <  strtotime($row['date_end'])){
                $max_date = strtotime($row['date_end']);
            }
            $inv->setEndDate($row['date_end']);
            $inv->syncAdminsEndDate();
        }

        $sub->ediSubParam(date('Y-m-d',$max_date),0);

    }

    public static function getFileSize($subscriber_id){
        return PatientFile::where('subscriber_id',$subscriber_id)->sum('size') ?? 0;
    }

    public function usedSpace(){
        $bytes  = self::getFileSize($this->id);
        return round($bytes / (1024 * 1024),2);
    }
}
