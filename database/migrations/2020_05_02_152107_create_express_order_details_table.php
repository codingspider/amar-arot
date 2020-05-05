<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpressOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('express_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exporder_id');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('qty');
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
        Schema::dropIfExists('express_order_details');
    }
}
