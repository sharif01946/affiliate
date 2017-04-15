<?php

use Illuminate\Database\Seeder;
use App\Affiliate;
use App\Product;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afs = array(
            "Commision Junction" => 45,
            "Flexoffers" => 30,
        );

        $pds = array(
            "Udemy Product 1" => array(
                "affiliate_id" => 1,
                "url" => "http://www.jdoqocy.com/click-8218422-11966343-1477426072000",
                "desc" => "Description",
            ),
            "Hostgator Product 1" => array(
                "affiliate_id" => 2,
                "url" => "http://www.jdoqocy.com/click-8218422-11966343-1477426072000",
                "desc" => "Description",
            ),
            
        );

        foreach ($afs as $key => $value) {
            $af = new Affiliate();
            $af->name = $key;
            $af->charity_commision = $value;
            $af->save();
        }
        foreach ($pds as $key => $item) {
            $p = new Product;
            $p->name = $key;
            $p->affiliate_id = $item["affiliate_id"];
            $p->url = $item["url"];
            $p->description = $item["desc"];
            $p->save();
        }
    }
}
