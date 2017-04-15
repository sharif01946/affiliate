<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charity;
use App\Donar;
use App\Commision;
use App\Campaign;
use Auth;
use Redirect;
use DB;

class DonarController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('donar');
    }
    public function index()
    {
        $categorys = DB::table('categories')
                    ->select('name')
                    ->get();

        return view('user.userdashboard',compact('categorys'));
    }


    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['charities'] = Charity::all(); // set the page title
        $this->data['donars'] = Donar::all(); // set the page title
        $this->data['campaigns'] = Campaign::all(); // set the page title
        $this->data['total_click'] = Commision::all()->sum("click");
        $this->data['total_lead'] = Commision::all()->sum("lead");
        $this->data['total_sales'] = Commision::all()->sum("sales");
        $this->data['total_impression'] = Commision::all()->sum("impression");
        $this->data['total_bonus'] = Commision::all()->sum("bonus");

            // dd($this->data);
        return view('user.dashboard', $this->data);

    }

    public function commisions()
    {
        $donar = Donar::findOrFail(Auth::guard("donar")->user()->id);
        return view('user.commisions-donar', ['item' => $donar]);
    }
    
    public function campaigns()
    {
        $donar = Donar::findOrFail(Auth::guard("donar")->user()->id);
        return view('user.donar.campaigns', ['donar' => $donar]);
    }
    
    public function charities()
    {
        $donar = Donar::findOrFail(Auth::guard("donar")->user()->id);
        return view('user.donar.charities', ['donar' => $donar]);
    }


    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        if( Auth::guard("donar")->check() ){
            return Redirect::to('/user/dashboard');
            // return $this->dashboard();
        }else{
            return Redirect::to('/user/login');
        }
    }
}
