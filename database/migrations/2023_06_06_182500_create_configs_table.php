<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url');
            $table->string('us_phone');
            $table->string('store_notice');
            $table->unsignedBigInteger('counpon_first_purchase');
            $table->foreign('counpon_first_purchase')->references('id')->on('counpons');
            $table->string('df_benefit1');
            $table->string('df_benefit2');
            $table->string('df_benefit3');
            $table->integer('get_freeship');
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
        Schema::dropIfExists('configs');
    }
}
