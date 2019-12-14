<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rec');
            $table->string('today_num');
            $table->string('added_id');
            $table->string('diagnosis');
            $table->string('code');
            $table->string('num')->default(1);
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
        Schema::dropIfExists('add_diagnoses');
    }
}
