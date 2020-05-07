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
            $table->bigIncrements('id');
            $table->bigInteger('user_id'); 
            $table->bigInteger('transection_id')->nullable();
            $table->bigInteger('shipping_address_id');
            $table->bigInteger('billing_address_id');
            $table->bigInteger('order_status_id');
            $table->string('slug')->nullable();
            $table->text('buyer_comment')->nullable();
            $table->text('seller_comment')->nullable();
            $table->text('admin_comment')->nullable();
            $table->float('total_amount')->nullable();
            $table->float('discount')->nullable();
            $table->float('shipping_charge')->nullable();
            $table->float('vat')->nullable();
            $table->float('service_charge')->nullable();
            $table->float('total_payable')->nullable();
            $table->string('applied_coupon')->nullable();
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
