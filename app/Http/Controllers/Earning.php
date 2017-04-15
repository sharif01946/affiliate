<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Charity;
use App\Campaign;
use App\Donar;
use URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Helpers\CJ;

class Earning extends Controller
{
    public function campaigns(){
        return view('earnings.campaigns', [
            'campaigns' => Campaign::all()
        ]);
    }
    
    public function campaigns_details($id){
        $item = Campaign::findOrFail($id);
        return view('earnings.campaign-details', [
            'campaign' => $item
        ]);
    }
    
    public function affiliates(){
        return view('earnings.affiliates', [
            'affiliates' => Affiliate::all()
        ]);
    }
    
    public function affiliates_details($id){
        $item = Affiliate::findOrFail($id);
        return view('earnings.affiliate-details', [
            'affiliate' => $item
        ]);
    }
    

    public function users(){
        return view('earnings.users', [
            'users' => Donar::where("status","active")->get()
        ]);
    }
    
    public function users_details($id){
        $item = Donar::findOrFail($id);
        return view('earnings.user-details', [
            'user' => $item
        ]);
    }

    public function charities(){
        return view('earnings.charities', [
            'charities' => Charity::where("status","active")->get()
        ]);
    }
    
    public function charity_details($id){
        $item = Charity::findOrFail($id);
        return view('earnings.charity-details', [
            'charity' => $item
        ]);
    }
    
    public function charity_group($id, $group){
        $item = Charity::findOrFail($id);
        return view('earnings.charity-group', [
            'charity' => $item,
            'group' => $group,
        ]);
    }


}
