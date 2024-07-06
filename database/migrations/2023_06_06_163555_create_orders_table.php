<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('shipping_cost');
            $table->string('payment_method');
            $table->integer('amount');
            $table->tinyInteger('status');
            $table->string('order_notes')->nullable();
            $table->unsignedBigInteger('billing_address_id');
            $table->foreign('billing_address_id')->references('id')->on('billing_addresses');
            $table->foreignId('counpon_id')->constrained('counpons');
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
        Schema::dropIfExists('orders');
    }
}
