<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommisionCharitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commision_charities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("campaign_id");
            $table->integer("charity_id");
            $table->integer("affiliate_id");
            $table->integer("commision_id");
            
            $table->tinyInteger("click")->default(0);
            $table->tinyInteger("sales")->default(0);
            $table->tinyInteger("bonus")->default(0);
            $table->tinyInteger("lead")->default(0);
            $table->tinyInteger("impression")->default(0);

            $table->string("type",100);
            $table->string("status",100)->nullable();
            $table->string("tracking_code")->nullable();
            $table->float("amount",8,2)->default(0);
            $table->string("source",100)->nullable();
            $table->text("note")->nullable();
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
        Schema::dropIfExists('commision_charities');
    }
}
