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
            $table->unsignedBigInteger('type_id'); // 設定外來鍵
            $table->foreign('type_id')->references('id')->on('product_type'); //直接關聯外來鍵並指向關聯資料表與欄位，接著可以使用自動產生Model
/*             $table->string('type_name'); */
            $table->string('title');
            $table->string('img');
            $table->string('description');
            $table->string('price');
            $table->string('sort');
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
