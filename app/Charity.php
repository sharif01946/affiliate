<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Charity extends Authenticatable
{
	use Notifiable;
	
	protected $fillable = ['name','group_id','charity_description','bank_name','bank_address','bank_swift','bank_account','email','password', 'created_at', 'updated_at', 'status',];
	
	protected $hidden = ['updated_at'];

	public function campaigns(){
        return $this->hasMany('App\Campaign');
    }
	
	public function group(){
		return $this->hasOne('App\CharityGroup', 'id','group_id');
	}
	
	public function commisioncharity(){
		return $this->hasMany('App\CommisionCharity');
	}
	
	public function commisions(){
		return $this->hasMany('\App\Commision');
	}
	
	public function chcommisions(){
		return $this->hasManyThrough('App\Commision','App\CommisionCharity','charity_id','commision_id','id');
	}

	
}
