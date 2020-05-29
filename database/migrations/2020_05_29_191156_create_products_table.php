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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('head_category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->longText('details');
            $table->integer('quantity');
            $table->string('size')->nullable();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->string('hot_deal')->nullable();
            $table->string('special_offer')->nullable();
            $table->string('today_offer')->nullable();
            $table->string('status')->default(0);
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('head_category_id')->references('id')->on('head_categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
