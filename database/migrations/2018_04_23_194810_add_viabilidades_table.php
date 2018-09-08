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
            $table->string('numero_vb');
            $table->string('numero_pre');
            $table->string('numero_ot');
            $table->string('nombre');
            $table->string('direccion');
            $table->enum('estado',['Activa','Terminada'])->default('Activa');
            $table->enum('red', ['fibra','cobre','television'])->default('television');
            $table->boolean('asignacion')->default(0);
            $table->date('fecha_reque');
            $table->enum('Localidad', ['Alcala','Andalucia','Ansermanuevo','Argelia','Bolivar','Buenaventura','Buga','Bugalagrande','Caicedonia','Cali','Calima','Candelaria','Cartago','Dagua','El_Aguila','El_Cairo','El_Cerrito','El_Dovio','Florida','Ginebra','Guacari','Jamundi','La_Cumbre','La_Union','La_Victoria','Obando','Palmira','Pradera','Restrepo','Riofrío','Roldanillo','San_Pedro','Sevilla','Toro','Trujillo','Tulua','Ulloa','Versalles','Vijes',"Yotoco","Yumbo","Zarzal"])->default('cali');
            $table->enum('tipo_trabajo',['Construccion','Mantenimiento','Viabilidad'])->default('Viabilidad');
            $table->timestamps();
        });

    }
// Alcalá
// Andalucía
// Ansermanuevo
// Argelia
// Bolívar
// Buenaventura
// Buga
// Bugalagrande
// Caicedonia
// Cali
// Calima - El Darién
// Candelaria
// Cartago
// Dagua
// El Águila
// El Cairo
// El Cerrito
// El Dovio
// Florida
// Ginebra
// Guacarí
// Jamundí
// La Cumbre
// La Unión
// La Victoria
// Obando
// Palmira
// Pradera
// Restrepo
// Riofrío
// Roldanillo
// San Pedro
// Sevilla
// Toro
// Trujillo
// Tuluá
// Ulloa
// Versalles
// Vijes
// Yotoco
// Yumbo
// Zarzal

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
