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
use Illuminate\Database\Eloquent\Model;

class UserA extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
    protected $table = 'users_a';
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullnameAttribute(){
        return  $this->surname.' ' .$this->name.' '.$this->nickname;
    }

    public static function archive(User $user){
        $ar = new UserA();
        $ar->fill($user->toArray());
        $ar->deleted_at = date('Y-m-d H:i:s');
        $ar->save();
    } 
}
