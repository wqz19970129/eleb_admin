<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->string('shop_img');
            $table->integer('brand');
            $table->integer('on_time');
            $table->integer('fengniao');
            $table->integer('bao');
            $table->integer('piao');
            $table->integer('zhun');
            $table->integer('start_send');
            $table->integer('send_cost');
            $table->string('notice');
            $table->string('discount');
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
        Schema::dropIfExists('admins');
    }
}
