<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddodersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addoders', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('order_code');
            $table->string('order_birth_time');
            $table->string('order_status');
            $table->string('shop_id');
            $table->string('shop_name');
            $table->string('shop_img');
            $table->string('name');
            $table->string('tel');
            $table->string('provence');
            $table->string('city');
            $table->string('area');
            $table->string('detail_address');
            $table->string('order_price');
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
        Schema::dropIfExists('addoders');
    }
}
