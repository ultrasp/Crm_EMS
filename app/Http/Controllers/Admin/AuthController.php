<?php
namespace App\Http\Controllers\Admin;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd(auth()->guard('admin')->user());
        // dd(Auth::guard('web')->check());
        if(auth()->guard('admin')->check()){
            abort(404);
        }
        // $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        if(auth()->guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        // dd(auth()->guard('admin')->check());
        return view('admin.auth.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            auth()->guard('web')->logout();
            $user = auth()->guard('admin')->user();
            
            \Session::put('success',__('auth.success'));
            return redirect()->route('admin.dashboard');
            
        } else {
            return back()->with('error',__('auth.failed'));
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        \Session::put('success',__('You are logout successfully'));        
        return redirect(route('adminLogin'));
    }
}
