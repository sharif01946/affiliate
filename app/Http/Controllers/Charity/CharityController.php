<?php

namespace App\Http\Controllers\Charity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charity;
use App\Affiliate;
use App\Commision;
use App\Campaign;
use Auth;
use Redirect;

class CharityController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('charity');
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
        $this->data['affiliates'] = Affiliate::all(); // set the page title
        $this->data['campaigns'] = Campaign::all(); // set the page title
        $this->data['total_click'] = Commision::all()->sum("click");
        $this->data['total_lead'] = Commision::all()->sum("lead");
        $this->data['total_sales'] = Commision::all()->sum("sales");
        $this->data['total_impression'] = Commision::all()->sum("impression");
        $this->data['total_bonus'] = Commision::all()->sum("bonus");

        return view('charity.dashboard', $this->data);
    }

    
    public function campaigns()
    {
        $charity = Charity::findOrFail(Auth::guard("charity")->user()->id);
        return view('charity.charity.campaigns', ['charity' => $charity]);
    }
    
    public function affiliates()
    {
        $charity = Charity::findOrFail(Auth::guard("charity")->user()->id);
        return view('charity.charity.affiliates', ['charity' => $charity]);
    }
    
    public function commisions()
    {
        $charity = Charity::findOrFail(Auth::guard("charity")->user()->id);
        return view('charity.commisions-charity', ['item' => $charity]);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        // return redirect('/charity');
        if( Auth::guard("charity")->check() ){
            return Redirect::to('/charity/dashboard');
            // return $this->dashboard();
        }else{
            return Redirect::to('/charity/login');
        }
    }
}
