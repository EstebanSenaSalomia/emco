<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contenido');
            $table->integer('user_id')->unsigned();
            $table->integer('viabilidad_id')->unsigned();
            $table->timestamps();

            $table->foreign('viabilidad_id')
            ->references('id')
            ->on('viabilidades')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
        // schema::create('comentario_user',function(Blueprint $table){

        //     $table->increments('id');
        //     $table->integer('comentario_id')->unsigned();
        //     $table->integer('user_id')->unsigned();

        //      $table->foreign('comentario_id')
        //     ->references('id')
        //     ->on('comentarios')
        //     ->onDelete('cascade');

        //     $table->foreign('user_id')
        //     ->references('id')
        //     ->on('users')
        //     ->onDelete('cascade');

        //     $table->timestamps();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
        // Schema::dropIfExists('comentario_user');
    }
}
