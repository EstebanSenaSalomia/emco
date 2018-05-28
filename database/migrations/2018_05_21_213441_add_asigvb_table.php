<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsigvbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignarvb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            //$table->string('estado')->default('1');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('asignarvb_viabilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asignarvb_id')->unsigned();
            $table->integer('viabilidad_id')->unsigned();

            $table->foreign('asignarvb_id')
            ->references('id')
            ->on('asignarvb')
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
        Schema::dropIfExists('asignarvb_viabilidad');
        Schema::dropIfExists('asignarvb');
    }
}
