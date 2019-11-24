<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        /*
        $this->call(CategoriaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(EmpleadoOrdenSeeder::class);
        $this->call(DetalleFacturaSeeder::class);
        */
        //$this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
