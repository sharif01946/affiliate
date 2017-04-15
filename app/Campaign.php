<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['name','url','product_id','image_path','product_category','description','ctoken','created_at', 'updated_at'];
	protected $hidden = ['updated_at'];

	public static function getByToken($token){
		return Campaign::where('ctoken', $token)->get()->first();
	}

	public function affiliate(){
		return $this->hasOne('App\Affiliate', 'id','affiliate_id');
	}
	
	public function product(){
		return $this->hasOne('App\Product', 'id','product_id');
	}

	/*public function commisioncharity(){
        return $this->hasMany('App\CommisionCharity');
    }*/

	/*public function commisions(){
		return $this->hasOne('App\CommisionCharity', 'id','campaign_id');
	}*/

	public function commisions(){
		// return $this->hasManyThrough('App\Commision','App\CommisionCharity');
		return $this->hasMany('\App\Commision');
	}

}

