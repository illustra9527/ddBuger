<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id'); // 設定外來鍵
            $table->foreign('city_id')->references('id')->on('location_city');
            $table->string('title');    // 店名
            $table->string('img');      // 店照
            $table->string('address');  // 地址
            $table->string('phone');    // 電話
            $table->string('opening');  // 營業時間
            $table->string('holiday');  // 固定店休
            $table->string('fbLink');   // fb連結
            $table->string('mapLink');  // google map 連結
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
        Schema::dropIfExists('locations');
    }
}
