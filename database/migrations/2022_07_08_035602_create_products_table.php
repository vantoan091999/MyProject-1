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
            $table->string('name');
            //kết nối khóa ngoại
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('tbl_brand');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tbl_category');
            $table->string('code');
            $table->string('quantity');
            $table->text('desciption');
            $table->text('content');
            $table->string('image');
            $table->string('price');
            $table->integer('status');
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
        Schema::dropIfExists('products');
    }
}
