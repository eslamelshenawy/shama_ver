<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->bigIncrements('doctor_id');
            $table->string("doctor_name");
            $table->string("doctor_specialist");
            $table->string("doctor_phone");
            $table->string('doctor_email')->unique();
            $table->string('doctor_username');
            $table->string('doctor_password');
            $table->string('doctor_address');
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
        Schema::dropIfExists('doctor');
    }
}
