<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->bigIncrements('appointment_id');
            $table->bigInteger("appointment_doctor_id")->unsigned();
            $table->integer('appointment_number');
            $table->string('appointment_type');
            $table->date('appointment_date');
            $table->text('appointment_description');
            $table->time('appointment_time');
            $table->foreign("appointment_doctor_id")->references('doctor_id')->on('doctor')->onDelete('cascade');
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
        Schema::dropIfExists('appointment');
    }
}
