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
            $table->bigInteger('transection_id');
            $table->bigInteger('shipping_address_id');
            $table->bigInteger('billing_address_id');
            $table->bigInteger('order_status_id');
            $table->string('slug');
            $table->text('buyer_comment');
            $table->text('seller_comment');
            $table->text('admin_comment');
            $table->float('total_amount');
            $table->float('discount');
            $table->float('shipping_charge');
            $table->float('vat');
            $table->float('service_charge');
            $table->float('total_payable');
            $table->string('applied_coupon');
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
