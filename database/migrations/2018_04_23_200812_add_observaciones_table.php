<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->integer('viabilidad_id')->unsigned();
            $table->timestamps();

            $table->foreign('orden_id')
            ->references('id')
            ->on('ordenes')
            ->onDelete('cascade');

            $table->foreign('viabilidad_id')
            ->references('id')
            ->on('viabilidades')
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
        Schema::dropIfExists('observaciones');
    }
}
