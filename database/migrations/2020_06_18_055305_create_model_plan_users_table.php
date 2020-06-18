<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPlanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planUsers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_plan')->references('id')->on('plans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('planUsers');
    }
}
