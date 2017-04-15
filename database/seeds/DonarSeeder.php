<?php

use Illuminate\Database\Seeder;
use App\Donar;

class DonarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $af = new Donar();
        $af->name = "Md. Sheikh Saidy";
        $af->first_name = "Md. Sheikh";
        $af->last_name = "Saidy";
        $af->email = "saidylive@gmail.com";
        $af->password = bcrypt("12345678");
        $af->status = "active";
        $af->save();
    }
}
