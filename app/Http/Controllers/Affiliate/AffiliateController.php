<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charity;
use App\Affiliate;
use App\Commision;
use App\Campaign;
use Auth;
use Redirect;

class AffiliateController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('affiliate');
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

        return view('affiliate.dashboard', $this->data);
    }

    public function commisions()
    {
        $affiliate = Affiliate::findOrFail(Auth::guard("affiliate")->user()->id);
        return view('affiliate.commisions-affiliate', ['item' => $affiliate]);
    }
    
    public function campaigns()
    {
        $affiliate = Affiliate::findOrFail(Auth::guard("affiliate")->user()->id);
        return view('affiliate.affiliate.campaigns', ['affiliate' => $affiliate]);
    }
    
    public function charities()
    {
        $affiliate = Affiliate::findOrFail(Auth::guard("affiliate")->user()->id);
        return view('affiliate.affiliate.charities', ['affiliate' => $affiliate]);
    }


    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        if( Auth::guard("affiliate")->check() ){
            return Redirect::to('/affiliate/dashboard');
            // return $this->dashboard();
        }else{
            return Redirect::to('/affiliate/login');
        }
    }
}
