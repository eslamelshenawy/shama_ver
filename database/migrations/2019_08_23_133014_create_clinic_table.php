<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic', function (Blueprint $table) {
            $table->bigIncrements('clinic_id');
            $table->bigInteger('clinic_doctor_id')->unsigned();
            $table->string('clinic_name');
            $table->string('clinic_place');
            $table->string('clinic_type');
            $table->string('clinic_description');
            $table->string('clinic_address');
            $table->foreign("clinic_doctor_id")->references("doctor_id")->on("doctor")->onDelete("cascade");
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
        Schema::dropIfExists('clinic');
    }
}
