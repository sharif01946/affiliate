<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    protected $fillable = ['commision_id','affiliate_id','donar_id','charity_id','campaign_id','click','sales','bonus','lead','impression','type','status','event_date','tracking_code','amount','donate_amount','user_amount','note','source','created_at', 'updated_at'];

    public function affiliate(){
		// return $this->hasOne('App\Affiliate', 'id','affiliate_id');
		return $this->belongsTo('App\Affiliate');
	}
	
	public function charity(){
		// return $this->hasOne('App\Charity', 'id','charity_id');
		return $this->belongsTo('App\Charity');
	}
	
	public function donar(){
		// return $this->hasOne('App\Donar', 'id','donar_id');
		return $this->belongsTo('App\Donar');
	}
	
	public function campaign(){
		// return $this->hasOne('App\Campaign', 'id','campaign_id');
		return $this->belongsTo('App\Campaign');
	}

}
