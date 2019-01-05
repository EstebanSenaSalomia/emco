<?php

use Faker\Generator as Faker;

$factory->define(App\viabilidad::class, function (Faker $faker) {
	
    return [
        
        'user_id' => $faker->numberBetween($min = 1, $max = 20),    
        'numero_vb' => $faker->numberBetween($min = 1000, $max = 9000),
        'numero_pre' => $faker->numberBetween($min = 1000, $max = 9000),
        'numero_ot' => $faker->numberBetween($min = 1000, $max = 9000),
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'red' => $faker->randomElement($array = array ('Fibra','Cobre','Televisión')),
        'fecha_reque' => $faker->date($format = 'y-m-d',$max='now'),
        'estado' => $faker->randomElement($array = array('Activa','Terminada')),
        'localidad' => $faker->randomElement($array = array('Cali','Jamundi','Pradera','Vijes')),
        'tipo_trabajo' => $faker->randomElement($array = array('Mantenimiento','Viabilidad','Construccion')),
    ];
});
	