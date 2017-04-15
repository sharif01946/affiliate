<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;


class AffiliateAuth extends Facade
{
	
	protected static function getFacadeAccessor() { return 'auth.driver_affiliate'; }
}