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
            $table->string('order_no');
            $table->string('total_price');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('recipient_addresss');
            $table->string('recipient_email');
            $table->string('recipient_time');
            $table->string('receipt');
            $table->string('remark','2000')->nullable();
            $table->string('status')->default('new_order');
            $table->softDeletes();
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
