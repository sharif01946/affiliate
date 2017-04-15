<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;


class DonarAuth extends Facade
{
	
	protected static function getFacadeAccessor() { return 'auth.driver_donar'; }
}