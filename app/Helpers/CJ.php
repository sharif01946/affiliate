<?php 
namespace App\Helpers;

use App\Commision;
use App\CommisionCharity;
use App\Affiliate;

class CJ{

	public static function Details() {
		$CJ_DevKey= "0093b1483ee4fb9cf9ba240051b2d3379c48b76140c791756a4668fd7b6c04ca1d64d6d37938d0fdd2c4c4a0a366ee600d86bed1858c7858260c387ced59324e57/0e83e8eecd807120160c3dbfc9cc7a75b0abdd3209ab21180dcd79c42c8c97f47f61099d868959237f0cdd6f371de5c280a9420732f9225fa3fbd15fb4426261";
		$CJ_DevKey= "0086689235d06038c05fca735394740bdd97ffc89f56242c01dbc8e9e2c8c29cbbe9e20d150a204f169d111cbb3400d7379b0feb174974f6675860c806e7355dc9/6e554d208bcb510aea1760904d9eed569c3dc64cb603bf744f1d20919fc7d1ac5fe33ed9bad917044597f4d16446edc46a5059c31a639710986d832a2023d9f9";
		$params = "";
		$args = array(
			"date-type" => "posting",
			"action-types" => "bonus,click,impression,sale,lead",
			"start-date" => date("Y-m-d", strtotime("-1 week")),
			"end-date" => date("Y-m-d"),
		);
		foreach ($args as $key => $value) {
			$params .=  $key."=".urlencode($value)."&";
		}
		$params = rtrim( $params,"&" );

		
		$targeturl="https://commission-detail.api.cj.com/v3/commissions?$params";
		 
		$ch = curl_init($targeturl);
		curl_setopt($ch, CURLOPT_POST, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.$CJ_DevKey));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = curl_exec($ch);
		curl_close($ch);
		
		 
		$xml = new \SimpleXMLElement($response);
		return $xml;
		// return $response;
	}

	public static function ImportData(){
		$items = CJ::Details();
        $commissions = $items->commissions->commission;
        $total = $commissions->count();
    	$data = array();
        for ($i=0; $i < $total; $i++) { 
        	$ditems = array();
        	$citems = array();

	        $item = $commissions[$i];
	        $ditems["status"] = (String) $item->{"action-status"};
	        $ditems["type"] = (String) $item->{"action-type"};
	        $ditems[$ditems["type"]] = 1;
	        $ditems["commision_id"] = (String) $item->{"commission-id"};
	        $ditems["affiliate_id"] = rand()%2 + 1;
	        $ditems["charity_id"] = 1;
	        $ditems["donar_id"] = 1;
	        $ditems["campaign_id"] = 1;
	        $ditems["event_date"] = (String) $item->{"event-date"};
	        $ditems["tracking_code"] = (String) $item->sid;
	        $ditems["amount"] = (String) $item->{"commission-amount"};
	        $ditems["source"] = "cj";
	        $data[] = $ditems;



        	if ( !Commision::where('commision_id', '=', $ditems["commision_id"])->exists() ) {
        		$affiliate = Affiliate::find( $ditems["affiliate_id"] );
        		if($affiliate){
        			$amount = (float) $ditems["amount"];
        			$affiliate_percentage = (float) $affiliate->charity_commision/100;
        			$donate_amount = $amount*$affiliate_percentage;
        			$user_amount = $amount-$donate_amount;
        			$ditems["donate_amount"] = $donate_amount;
        			$ditems["user_amount"] = $user_amount;
        		}
	        	$commision = Commision::create($ditems);

		        /*$citems["amount"] = $ditems["amount"];
		        $citems["affiliate_id"] = $ditems["affiliate_id"];
		        $citems["campaign_id"] = 1;
		        $citems["charity_id"] = 1;
		        $citems["commision_id"] = $commision->id;
		        $citems["type"] = $ditems["type"];
		        $citems[$ditems["type"]] = 1;
		        $citems["status"] = $ditems["status"];
		        $citems["tracking_code"] = $ditems["tracking_code"];
		        $citems["source"] = $ditems["source"];
		        $charity_commision = CommisionCharity::create($citems);*/
        	}
        }
		// return $data;
	}

}