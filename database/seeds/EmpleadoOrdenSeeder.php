<?php

use App\Models\ClienteServicio;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class EmpleadoOrdenSeeder extends Seeder
{

    public function run()
    {
        for ($i = 0; $i < 5; $i++) {

            $id_servicio = Servicio::inRandomOrder()->value('id');
            $id_cliente_servicio = ClienteServicio::inRandomOrder()->value('id');


            $servicio = Servicio::find($id_servicio);
            $cliente_servicio = ClienteServicio::find($id_cliente_servicio);


            $servicio->empleado_orden()->save(factory(App\Models\EmpleadoOrden::class)->make());
            $cliente_servicio->empleado_orden()->save(factory(App\Models\EmpleadoOrden::class)->make());
        }
    }
}
