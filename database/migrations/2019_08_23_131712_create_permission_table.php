<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->bigIncrements('per_id');
            $table->bigInteger('per_role_id')->unsigned();
            $table->string("per_module")->unique()->nullable();
            $table->string("name");
            $table->timestamps();
        });


        Schema::table('permission', function($table)
        {
//            $table->foreign("per_role_id")->references("role_id")->on("role")->onDelete("cascade");
            $table->foreign('per_role_id')
                ->references('role_id')->on('role')
                ->onDelete('cascade');


        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission');
    }
}
