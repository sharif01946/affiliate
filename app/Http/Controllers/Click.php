<?php

namespace App\Http\Controllers;

use App\Campaign as CampaignModel;
use Illuminate\Http\Request;

class Click extends Controller
{
    public function redirect($token){
    	$stoken = urlencode($token);
        $item = CampaignModel::getByToken($token);
        $affiliate = $item->affiliate;

        /*echo "<pre>";
        print_r($affiliate);
        echo "</pre>";*/

    	$url = $affiliate->url.$affiliate->tracking_token;
        return redirect($url);
    }
}
