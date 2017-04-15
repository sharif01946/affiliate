<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    protected $data = []; // the information we send to the view

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

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    // if not logged in redirect to
    protected $loginPath = '/user/login';
    // after you've logged in redirect to
    protected $redirectTo = '/user/home';
    // after you've logged out redirect to
    protected $redirectAfterLogout = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

        // $this->loginPath = config('backpack.base.route_prefix', 'admin').'/login';
        // $this->redirectTo = config('backpack.base.route_prefix', 'admin').'/dashboard';
        // $this->redirectAfterLogout = config('backpack.base.route_prefix', 'admin');
    }

    // -------------------------------------------------------
    // Laravel overwrites for loading backpack views
    // -------------------------------------------------------

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */

    protected function getFailedLoginMessage(){
        return "These credentials do not match our records.";
    }

    public function login()
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to($this->loginPath)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password'),
                'status'  => "active",
            );

            $user = \App\Donar::Where("email",$userdata["email"])->first();
            if($user && $user->status != "active"){
                return Redirect::to($this->loginPath)
                ->withErrors([
                    'email' => 'Your account is pending. Need admin confirmaiton to login.'
                ])
                ->withInput(Input::except('password'));
            }
            if ($this->guard()->attempt($userdata)) {
                return Redirect::to($this->redirectTo);
            } else {        
                return Redirect::to($this->loginPath)->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
            }
        }
    }
    

    public function showLoginForm()
    {
        if( Auth::guard("donar")->check() ){
            return Redirect::to($this->redirectTo);
        }else{
            $this->data['title'] = trans('backpack::base.login'); // set the page title
            return view('user.auth.login', $this->data);
        }

    }

    protected function guard()
    {
        return Auth::guard("donar");
    }
}
