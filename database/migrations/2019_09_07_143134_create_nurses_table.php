<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rec');
            $table->string('added_id');
            $table->string('temperature');
            $table->string('BP');
            $table->string('weight');
            $table->string('height');
            $table->string('pulse');
            $table->string('sight');
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
        Schema::dropIfExists('nurses');
    }
}
