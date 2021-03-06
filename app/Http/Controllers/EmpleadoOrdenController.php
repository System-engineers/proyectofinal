<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Http\Requests\EmpleadoOrdenRequest;
use App\Http\Resources\EmpleadoOrden as AppEmpleadoOrden;
>>>>>>> origin/saenz
use App\Models\ClienteServicio;
use App\Models\Empleado;
use App\Models\EmpleadoOrden;
use App\Models\Orden;
use App\Models\Servicio;
use Illuminate\Http\Request;

class EmpleadoOrdenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:empleadoorden-list');
        $this->middleware('permission:empleadoorden-create', ['only' => ['create','store']]);
        $this->middleware('permission:empleadoorden-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empleadoorden-delete', ['only' => ['destroy']]);
    
    }

    public function index()
    {
<<<<<<< HEAD
        $empleadoordenes = EmpleadoOrden::with('orden', 'empleado')->get();
        return view('detalle_orden.index', compact('empleadoordenes'));
    }

    public function show($id)
    {
        if (request()->ajax()) {
            $categoria = Categoria::find($id);
            return response()->view('ajax.detalle_categoria', compact('categoria'));
        } else {
            abort(401, 'Acceso Ilegal');
        }
    }

=======
        $empleadoordenes = AppEmpleadoOrden::collection(EmpleadoOrden::all());
        return view('detalle_orden.index', compact('empleadoordenes'));
    }

    
>>>>>>> origin/saenz
    public function create()
    {
        $empleados = Empleado::select('id', 'nombres')->get();
        $ordenes = Orden::select('id', 'nombre')->get();
        $servicios = Servicio::select('id', 'nombre', 'precio')->get();
        $especiales = ClienteServicio::select('id', 'precio', 'servicio_id')->with('servicio')->get();

        return view('detalle_orden.create', compact('empleados', 'ordenes', 'servicios', 'especiales'));
    }

<<<<<<< HEAD
    public function store(Request $request)
=======
    public function store(EmpleadoOrdenRequest $request)
>>>>>>> origin/saenz
    {

        $resultado = $request->id_servicio;
        $resultado = explode('-', $resultado);

        if ($resultado[0] == 's') {
            $servicio = Servicio::find($resultado[1]);
        } else {
            $servicio = ClienteServicio::find($resultado[1]);
        }

        $detalle = new EmpleadoOrden;

        $detalle->orden_id = $request->orden_id;
        $detalle->empleado_id = $request->empleado_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->estado = 1;

        $servicio->empleado_orden()->save($detalle);

        return redirect()->route('empleadoorden.index')->with('success', 'ORDEN DE EMPLEADO REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $empleadoorden = EmpleadoOrden::find($id);
=======
        $empleadoorden = new AppEmpleadoOrden(EmpleadoOrden::find($id));
        
>>>>>>> origin/saenz
        $empleados = Empleado::select('id', 'nombres')->get();
        $ordenes = Orden::select('id', 'nombre')->get();
        

        return view('detalle_orden.edit', compact('empleadoorden', 'empleados', 'ordenes'));
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
=======
    public function update(EmpleadoOrdenRequest $request, $id)
>>>>>>> origin/saenz
    {
        $detalle = EmpleadoOrden::find($id);

        $detalle->orden_id = $request->orden_id;
        $detalle->empleado_id = $request->empleado_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->estado = $request->estado;

        $detalle->update();

        return redirect()->route('empleadoorden.index')->with('success', 'ORDEN DE EMPLEADO ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $empleadoorden = EmpleadoOrden::find($id);
        $empleadoorden->delete();
        return redirect()->route('empleadoorden.index')->with('success', 'ORDEN DE EMPLEADO ELIMINADO CON EXITO!');
    }
}
