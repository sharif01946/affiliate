<?php

use Illuminate\Database\Seeder;
use App\CharityGroup;
use App\Charity;
use App\Campaign;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cg = new CharityGroup();
    	$cg->name = "Group one";
    	$cg->description = "Description for group one";
    	$cg->slug = "group-one";
    	$cg->save();

        $af = new Charity();
        $af->name = "Charity One";
        $af->group_id = $cg->id;
        $af->email = "saidylive@gmail.com";
        $af->password = bcrypt("12345678");
        $af->charity_description = "Description";
        $af->bank_name = "Bank Name";
        $af->bank_address = "Vank Address";
        $af->bank_swift = "123456987";
        $af->bank_account = "1254545212";
        $af->status = "active";
        $af->save();

        $camp = new Campaign;
        $camp->name = "Udemy";
        $camp->product_id = 1;
        $camp->url = "http://localhost/laravel-affiliate/index.php/click/tmGYI5QfCNwD16fonWRjeWq1BFs";
        $camp->description = "description";
        $camp->ctoken = "tmGYI5QfCNwD16fonWRjeWq1BFs";
        $camp->save();
    }
}
