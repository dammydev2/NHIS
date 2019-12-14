<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddcaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rec');
            $table->string('name');
            $table->string('age');
            $table->string('added_id');
            $table->string('date');
            $table->string('today_num');
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
        Schema::dropIfExists('addcares');
    }
}
