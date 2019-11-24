<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Categoria::class, 10)
            ->create()
            ->each(function ($categoria) {
                $categoria->servicios()->save(factory(App\Models\Servicio::class)->make());
            });
    }
}
