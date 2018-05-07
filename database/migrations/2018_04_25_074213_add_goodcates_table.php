<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoodcatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('goodcates', function (Blueprint $table) {
            $table->string('is_selected');
            $table->string('type_accumulation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('goodcates', function (Blueprint $table) {
            $table->dropColumn('is_selected');
            $table->dropColumn('type_accumulation');
        });
    }
}
