<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\UserConfirmationCode;
use App\Notifications\UserRecoveryMailSend;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const STATUS_NOT_ACTIVATED = 0;
    const STATUS_EMAIL_CONFIRMED = 1;
    const STATUS_ACTIVATED = 3;

    const ROLE_OWNER = 'owner';
    const ROLE_MANAGER = 'manager';
    const ROLE_DOCTOR = 'doctor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        // 'password',
        'nickname',
        'surname',
        'specialization',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'confirmation_code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullnameAttribute(){
        return  $this->surname.' ' .$this->name.' '.$this->nickname;
    }

    public function getFullname2Attribute(){
        return  ucfirst($this->surname).' ' .mb_strtoupper(mb_substr($this->name, 0,1)).'. '.mb_strtoupper(mb_substr($this->nickname, 0,1)).'.';
    }

    public function isDoctor(){
        return $this->role == self::ROLE_DOCTOR;
    }

    public function isManager(){
        return $this->role == self::ROLE_MANAGER;
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscribe::class,'subscriber_id');
    }

    public function inviteCode()
    {
        return $this->hasOne(InviteCode::class,'user_id');
    }

    public static function register($input){
        $t = new self();
        $t->fill($input);
        $t->password = Hash::make($input['password']);
        if(empty($input['invite_code'])){
            $t->confirmation_code =  Str::random(10);
            $t->status = self::STATUS_NOT_ACTIVATED;
        }else{
            $t->status = self::STATUS_ACTIVATED;
            $invite = InviteCode::where('code',$input['invite_code'])->first();
            $t->subscriber_id = $invite->subscriber_id;
            $t->role =  $invite->role;
            $t->specialization = $invite->subscriber->specialization_id;
        }
        if(empty($input['invite_code'])){
            $t->notify(new UserConfirmationCode($t));
            $t->save();
        }else{
            $t->save();
            $invite->user_id = $t->id;
            $invite->save();
            Auth::login($t);
        }
    }

    public function confirmEmail(){
        $this->status = self::STATUS_EMAIL_CONFIRMED;
        $this->save();
    }

    public function sendResetEmail($token){
        $this->notify(new UserRecoveryMailSend($this,$token));
    }

    public function updatePassword($password){
        $this->password = \Hash::make($password);
        $this->update(); //or $user->save();
    }

    public function initSubscribe($sub_id, $date, $role){
        $this->status = self::STATUS_ACTIVATED;
        $this->subscriber_id = $sub_id;
        $this->role = $role;
        $this->save();
    }

    public function reset(){
        $this->status = self::STATUS_EMAIL_CONFIRMED;
        $this->subscriber_id = 0;
        $this->role = null;
        // $this->specialization = null;
        $this->save();
    } 

    public function saveFile($requestFile, $attr){
        if(empty($requestFile))
            return;
        
        $old_value = $this->$attr;

        $fileName = time().'.'.$requestFile->getClientOriginalExtension();
        $filePath = $requestFile->storeAs('', $fileName, 'public_uploads');
        $this->$attr = $filePath;

        if(!empty($old_value) && is_file(public_path('uploads/'.$old_value))){
            unlink(public_path('uploads/'.$old_value));
        }

    }

    public function getAva(){
        return empty($this->avatar) ? '' : asset('uploads/'.$this->avatar);
    }

    public function isStomSpec(){
        return $this->specialization == 1;
    }
}
