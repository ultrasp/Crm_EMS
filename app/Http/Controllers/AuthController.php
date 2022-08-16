<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\InviteCode;

class AuthController extends Controller{

	public function register(Request $request){
		$this->validate($request, [
            'nickname' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => ['required','email','unique:users',function ($attribute, $value, $fail)use($request) {
                if (!empty($request->invite_code) && InviteCode::where(['email'=>$value,'code' => $request->invite_code,'user_id'=>0])->count() == 0) {
                    $fail('Неправильний інвайт код.');
                }
            }],
            'password' => 'required',
            'specialization' => 'required_without:invite_code',
        ]);

        User::register($request->input());
        return response()->json([
            'success'=> 1,
            'url' => empty($request->invite_code) ? '' : url('patients')
        ]);
    }

    public function confirmEmail($key){
        $user = User::where(['confirmation_code' => $key])->first();
        $user->confirmEmail();
        Auth::login($user);
        return redirect('/first-payment');
    }

    public function sendRecovery(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        //Check if the user exists
        if (empty($user)) {
            return response()->json(['error_'=> __('Email does not exist')],403);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($user->sendResetEmail($tokenData->token)) {
            return response()->json(['message'=> __('A reset link has been sent to your email address.')]);
        } else {
            return response()->json(['error_'=> __('A Network Error occurred. Please try again.')],403);
        }

    }

    public function checkPincode(Request $request){
        $this->validate($request, ['pincode'=>'required']);
        $user = User::where(['confirmation_code' => $request->pincode])->first();
        $has_error = true;
        $error = '';
        if(empty($user)){
            $error = 'В базі не знайдено код активації';
        }elseif ($user->status != User::STATUS_NOT_ACTIVATED){
            $error = 'Код активації вже використано для активації. Будь ласка перевірте код';
        }else{
            $has_error = false;
        }
        if($has_error){
            return response()->json([
                'error_' => $error,
                'code' => 403,
            ], 403);

        }else{
            return response()->json(1);
        }
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email' , $request->input('email'))->first();

        if(empty($user)){
            return $this->authError(__('Unauthenticated user'));
        }

        if(!Hash::check($request->input('password'),$user->password)){
            return $this->authError(__('Unauthenticated user'));
        }

        if($user->status == User::STATUS_NOT_ACTIVATED){
            return $this->authError(__('User status not activated'));
        }

        if($user->status == User::STATUS_ACTIVATED){
            if(empty($user->inviteCode)){
                return $this->authError(__('Unauthenticated user'));
            }
            if(strtotime($user->inviteCode->end_date) < strtotime(date('d-m-Y'))){
                return $this->authError(__('User account end date expired'));
            }
        }
            Auth::login($user);
            return response()->json(['redirect'=> $user->status == User::STATUS_ACTIVATED ? route('patients') : url('/first-payment')]);
        // if (auth()->attempt([
        //         'email' => $request->input('email'),
        //         'password' => $request->input('password'),
        //         'status' => User::STATUS_ACTIVATED
        //     ])) {
        //     // Authentication passed...
        //     return response()->json(['redirect'=>route('patients')]);
        // }

        // return response()->json([
        //     'error_' => __('Unauthenticated user'),
        //     'code' => 401,
        // ], 401);

    }

    public function logout(){
        auth()->logout();
        return response()->json(['redirect'=>route('login')]);
    }

    public function authError($error){
        return response()->json([
            'error_' => $error,
            'code' => 401,
        ], 401);
    }

    public function saveNewPassword(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'token' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $user->updatePassword($request->password);
        Auth::login($user);
        DB::table('password_resets')->where('email', $user->email)->delete();

        return response()->json(['url' => url('/patients')]);
    }
}
