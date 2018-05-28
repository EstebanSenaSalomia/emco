<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('viabilidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->string('nombre');
            $table->string('direccion');
            $table->enum('red', ['fibra','cobre','television'])->default('television');
            $table->boolean('estado')->default(0);

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
        
        Schema::dropIfExists('viabilidades');
      
    }
}
