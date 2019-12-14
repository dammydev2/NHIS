<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rec');
            $table->string('today_num');
            $table->string('name');
            $table->string('patient_id');
            $table->string('hmo');
            $table->string('nhis');
            $table->string('hospital');
            $table->string('clinic')->nullable();
            $table->string('authorization');
            $table->string('today');
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
        Schema::dropIfExists('authorizations');
    }
}
