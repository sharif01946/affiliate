<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'name','charity_commision',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function campaigns(){
        return $this->hasMany('App\Campaign');
    }

    public function commisions(){
        return $this->hasMany('App\Commision');
    }
    
    public function commisioncharity(){
		return $this->hasMany('App\CommisionCharity');
	}

    public static function FromEmail($email)
    {
        
    }
    
}
