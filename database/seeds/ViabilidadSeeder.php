<?php

use Illuminate\Database\Seeder;

class ViabilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\viabilidad::class,500)->create();
    }
}
