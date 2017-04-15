<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = "Md. Sheikh Saidy";
		$u->email = "saidylive@gmail.com";
		$u->password = bcrypt("12345678");
		$u->save();
    }
}
