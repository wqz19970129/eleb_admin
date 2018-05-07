<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('is_selected');
            $table->string('logo');
            $table->string('rating');
            $table->string('goods_price');
            $table->string('detail');
            $table->string('month_sales');
            $table->string('satisfy_count');
            $table->string('satisfy_rate');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('goodcates');
            $table->integer('a_id')->unsigned();
            $table->foreign('a_id')->references('id')->on('admins');
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
        Schema::dropIfExists('goods');
    }
}
