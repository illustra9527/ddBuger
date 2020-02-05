<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruit_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id'); // 設定外來鍵
            $table->foreign('city_id')->references('id')->on('location_city');
            $table->string('shop_id');
            $table->string('contact_name');
            $table->string('remark');
            $table->integer('sort');
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
        Schema::dropIfExists('recruit_job');
    }
}
