<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','affiliate_id','url',];


    public function affiliate(){
		return $this->hasOne('App\Affiliate', 'id','affiliate_id');
	}

}
