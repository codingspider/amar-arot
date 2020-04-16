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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_bn')->nullable();
            $table->float('price');
            $table->float('stock_qty');
            $table->float('rating');
            $table->bigInteger('rating_by');
            $table->float('sale_price')->nullable();
            $table->string('product_code');
            $table->string('variation_type')->comment('size, color');
            $table->string('image');
            $table->text('description');
            $table->text('description_bn')->nullable();
            $table->string('short_description');
            $table->string('short_description_bn')->nullable();
            $table->bigInteger('catagory_id');
            $table->bigInteger('measurment_unit_id');
            $table->bigInteger('seller_id');
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
