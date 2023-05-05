<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class LoginController extends Controller
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

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        //if(Auth::user()->roles == 0)
        $user = User::where('email',$request->email)->first();
        if( $user->roles == 0 && $user->active == 0){
            return redirect()->intended('admin/dashboard');
        } else if($user->roles == 1 && $user->active == 1){
            $this->logout($request);
            return $this->unauthorized();
        }else{
             return redirect()->intended('/');
        
        }
    
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function unauthorized(){
        //echo "<pre>"; print_r('expression'); exit;
        return view('error');
    }

    public function logout(Request $request) {
        //echo "<pre>"; print_r('expression'); exit;
        
        $user = Auth::user();
       
        //echo "<pre>"; print_r($user); exit;
            if ($user->roles == 0) {
                Auth::logout();
                return redirect('/admin/login');
            }else{
                Auth::logout();
                return redirect('/');
            } 
        
    }
}
