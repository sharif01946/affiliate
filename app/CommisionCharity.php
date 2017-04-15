<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommisionCharity extends Model
{
	protected $fillable = ["campaign_id","charity_id","affiliate_id","commision_id",'click','sales','bonus','lead','impression',"type","status","tracking_code","amount","source","note",'created_at', 'updated_at'];


	public function charity(){
		return $this->hasOne('App\Charity', 'id','charity_id');
	}
	
	public function affiliate(){
		return $this->hasOne('App\Affiliate', 'id','affiliate_id');
	}
	
	public function commision(){
		return $this->hasOne('App\Commision', 'id','commision_id');
	}
	
	public function campaign(){
		return $this->hasOne('App\Campaign', 'id','campaign_id');
	}

}
