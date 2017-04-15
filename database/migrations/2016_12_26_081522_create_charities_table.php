<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charities', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer("group_id")->default(0);
            $table->text("charity_description")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("bank_address")->nullable();
            $table->string("bank_swift")->nullable();
            $table->string("bank_account")->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('status',60)->default("pending");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charities');
    }
}
