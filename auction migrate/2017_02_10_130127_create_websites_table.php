<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('url');
            $table->date('establish_date');
            $table->string('tragline');
            $table->string('summary');
            $table->text('description');
            $table->boolean('has_revenue');
            $table->boolean('has_traffic');
            $table->float('price');
            $table->float('min_price');
            $table->float('monthly_revenue');
            $table->float('monthly_expense');
            $table->integer('auction_duration');
            $table->date('auction_end');
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
        Schema::dropIfExists('websites');
    }
}
