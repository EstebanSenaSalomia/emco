<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cedula')->unique();
            $table->string('telefono');
            $table->enum('type', ['admin', 'gestor','supervisor'])->default('supervisor');
            $table->enum('empresa', ['Emcomunitel','HB','P Y P'])->default('Emcomunitel');
            $table->string('password');
            $table->boolean('asignacion')->default(0);
            $table->boolean('estado_usu')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
