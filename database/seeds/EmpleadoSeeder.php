<?php

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Empleado::class,20)->create();
    }
}
