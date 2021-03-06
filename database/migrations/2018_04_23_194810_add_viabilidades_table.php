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
            $table->integer('user_id')->unsigned();
            $table->string('numero_vb')->nullable();
            $table->string('numero_pre')->nullable();
            $table->string('numero_ot')->nullable();
            $table->string('nombre');
            $table->string('contacto')->nullable();
            $table->string('contacto_num')->nullable();
            $table->string('direccion');
            $table->enum('estado',['Activa','Terminada'])->default('Activa');
            $table->enum('red', ['fibra','cobre','television'])->default('television');
            $table->boolean('asignacion')->default(0);
            $table->date('fecha_reque');
            $table->enum('localidad', ['Alcala','Andalucia','Ansermanuevo','Argelia','Bolivar','Buenaventura','Buga','Bugalagrande','Caicedonia','Cali','Calima','Candelaria','Cartago','Dagua','El_Aguila','El_Cairo','El_Cerrito','El_Dovio','Florida','Ginebra','Guacari','Jamundi','La_Cumbre','La_Union','La_Victoria','Obando','Palmira','Pradera','Restrepo','Riofrío','Roldanillo','San_Pedro','Sevilla','Toro','Trujillo','Tulua','Ulloa','Versalles','Vijes',"Yotoco","Yumbo","Zarzal"])->default('cali');
            $table->enum('tipo_trabajo',['Construccion','Mantenimiento','Viabilidad'])->default('Viabilidad');
            $table->timestamps();

<<<<<<< HEAD
=======
        });

         Schema::create('user_viabilidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('viabilidad_id')->unsigned();
            $table->integer('user_id')->unsigned();

>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
<<<<<<< HEAD
=======

            $table->foreign('viabilidad_id')
            ->references('id')
            ->on('viabilidades')
            ->onDelete('cascade');

            $table->timestamps();
>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_viabilidad');
        Schema::dropIfExists('viabilidades');
      
    }
}
