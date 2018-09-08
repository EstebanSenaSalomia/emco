<?php

use Faker\Generator as Faker;

$factory->define(App\viabilidad::class, function (Faker $faker) {
	
    return [
        'numero' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'nombre' => $faker->name,
        'direccion' => $faker->address,
        'red' => $faker->randomElement($array = array ('Fibra','Cobre','Televisión')),
        'fecha_reque' => $faker->date($format = 'y-m-d',$max='now'),
       
    ];
});
	