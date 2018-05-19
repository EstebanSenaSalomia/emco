<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsignacionVbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('asignacionVb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('viabilidad_id')->unsigned();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table->foreign('viabilidad_id')
            ->references('id')
            ->on('viabilidades')
            ->onDelete('cascade');

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
        Schema::dropIfExists('asignacionVb');
    }
}
