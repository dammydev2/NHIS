<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateICDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_c_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rec');
            $table->string('today_num');
            $table->string('surname');
            $table->string('other_name');
            $table->string('added_id');
            $table->string('address');
            $table->string('date');
            $table->string('email')->nullable();
            $table->string('spouse');
            $table->string('gender');
            $table->string('kin');
            $table->string('kin_address');
            $table->string('xray');
            $table->string('kin_phone');
            $table->string('domicile')->nullable();
            $table->string('nationality')->nullable();
            $table->string('occupation')->nullable();
            $table->string('date_acceptance')->nullable();
            $table->string('referred')->nullable();
            $table->string('surgeon');
            $table->string('ward')->nullable();
            $table->string('discharged')->nullable();
            $table->string('discharged_to')->nullable();
            $table->string('condition')->nullable();
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
        Schema::dropIfExists('i_c_d_s');
    }
}
