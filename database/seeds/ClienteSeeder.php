<?php

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
 
    public function run()
    {
        factory(App\Models\Cliente::class, 15)->create()->each(function ($cliente) {

            $orden = $cliente->ordenes()->save(factory(App\Models\Orden::class)->make());

            $orden->facturas()->save(factory(App\Models\Factura::class)->make());

            $cliente->servicios()->attach($this->arrayServicio(rand(1,5)), ['precio' => rand(20000,200000)]);

        });
    }

    public function arrayServicio($max)
    {
        $servicios = Servicio::inRandomOrder()
            ->take($max)
            ->get()
            ->pluck('id');

        return $servicios->toArray();
    }
}
