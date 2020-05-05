<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpressOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('express_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->comment('Pending','Confired','Delivered');
            $table->tinyInteger('read_status')->comment('1=Unread','0=Read')->nullable();
            $table->tinyInteger('user_status')->comment('1=Confired','0=Cancel')->nullable();
            $table->tinyInteger('user_id');
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
        Schema::dropIfExists('express_orders');
    }
}
