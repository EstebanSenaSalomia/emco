<?php

use Faker\Generator as Faker;

$factory->define(App\viabilidad::class, function (Faker $faker) {
	
    return [
        
<<<<<<< HEAD
        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 20),    
        'numero_vb' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'numero_pre' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'numero_ot' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
=======
        // 'user_id' => $faker->numberBetween($min = 1, $max = 20),    
        'numero_vb' => $faker->numberBetween($min = 1000, $max = 9000),
        'numero_pre' => $faker->numberBetween($min = 1000, $max = 9000),
        'numero_ot' => $faker->numberBetween($min = 1000, $max = 9000),
>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'red' => $faker->randomElement($array = array ('Fibra','Cobre','Televisión')),
        'fecha_reque' => $faker->date($format = 'y-m-d',$max='now'),
        'estado' => $faker->randomElement($array = array('Activa','Terminada')),
        'localidad' => $faker->randomElement($array = array('Cali','Jamundi','Pradera','Vijes')),
        'tipo_trabajo' => $faker->randomElement($array = array('Mantenimiento','Viabilidad','Construccion')),
        'contacto' => $faker->name,
        'contacto_num' => $faker->tollFreePhoneNumber,
    ];
});
	