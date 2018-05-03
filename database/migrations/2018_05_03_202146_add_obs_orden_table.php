<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObsOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('obs_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contenido');
            $table->integer('orden_id')->unsigned();
            $table->timestamps();

            $table->foreign('orden_id')
            ->references('id')
            ->on('ordenes')
            ->onDelete('cascade');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('obs_ordenes');
    }
}
