<?php

use App\Models\EmpleadoOrden;
use App\Models\Factura;
use Illuminate\Database\Seeder;

class DetalleFacturaSeeder extends Seeder
{

    public function run()
    {
        for ($i = 0; $i < 5; $i++) {

            $id_factura = Factura::inRandomOrder()->value('id');

            $factura = Factura::find($id_factura);

            $factura->empleado_orden()->attach($this->arrayDetalle(rand(1, 5)), ['valor' => rand(20000, 200000)]);
        }
    }

    public function arrayDetalle($max)
    {
        $empleado_orden = EmpleadoOrden::inRandomOrder()
            ->take($max)
            ->get()
            ->pluck('id');

        return $empleado_orden->toArray();
    }
}
