<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('patient_id');
            $table->string('nhis_id');
            $table->string('hmo');
            $table->string('phone');
            $table->string('ministry');
            $table->string('address');
            $table->string('gender');
            $table->string('dob');
            $table->string('marital');
            $table->string('occupation');
            $table->string('religion');
            $table->string('relationship');
            $table->string('summary');
            $table->string('diagnosis');
            $table->string('date');
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
        Schema::dropIfExists('patients');
    }
}
