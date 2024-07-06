<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('img_url');
                $table->string('brand');
                $table->string('type');
                $table->date('mfg'); // ngay sx
                $table->string('life'); // han su dung
                $table->string('slug');
                $table->longText('summary');
                $table->longText('description');
                $table->string('sku'); // ma hang hoa
                $table->integer('price');
                $table->integer('old_price');
                $table->float('discount')->nullable();
                $table->smallInteger('qty')->default(1);
                $table->boolean('best_seller')->default(0);
                $table->boolean('hot_product')->default(0);
                $table->boolean('trending_product')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
