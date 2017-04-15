<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donar extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name','first_name','last_name','email', 'password', 'status',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function campaigns(){
        // return $this->hasMany('App\Campaign');
        // return $this->hasManyThrough('App\Campaign','App\Commision','campaign_id');

        return DB::table('campaigns')
        ->join('commisions', 'commisions.campaign_id', '=', 'campaigns.id')
        ->select('campaigns.*')
        // ->groupBy('campaigns.id')
        ->where('commisions.donar_id', '=', $this->id)->get();




        /*$campaigns = Campaign::with('commisions')
        ->leftJoin('commisions', 'campaigns.id', '=', 'commisions.campaign_id')
        ->selectRaw(
            'campaigns.*'
        )
        ->where('commisions.donar_id',$this->id)
        ->groupBy('campaigns.id')
        ->orderBy('campaigns.created_at', 'asc');
        return $campaigns->get();*/
    }


    public function charities(){
        return $this->belongsToMany('App\Charity', 'commisions', 'campaign_id', 'donar_id')
        ->withPivot([ 'id' ]);
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
