<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\ClienteServicio;
use App\Models\Empleado;
use App\Models\EmpleadoOrden;
use App\Models\Orden;
use App\Models\Servicio;
use Illuminate\Http\Request;

class EmpleadoOrdenController extends Controller
=======
use App\Http\Requests\OrdenRequest;
use App\Http\Resources\Orden as AppOrden;
use App\Models\Cliente;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
>>>>>>> origin/saenz
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
        $this->middleware('permission:empleadoorden-list');
        $this->middleware('permission:empleadoorden-create', ['only' => ['create','store']]);
        $this->middleware('permission:empleadoorden-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empleadoorden-delete', ['only' => ['destroy']]);
    
=======
        $this->middleware('permission:orden-list');
        $this->middleware('permission:orden-create', ['only' => ['create','store']]);
        $this->middleware('permission:orden-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:orden-delete', ['only' => ['destroy']]);
>>>>>>> origin/saenz
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

    public function create()
    {
        $empleados = Empleado::select('id', 'nombres')->get();
        $ordenes = Orden::select('id', 'nombre')->get();
        $servicios = Servicio::select('id', 'nombre', 'precio')->get();
        $especiales = ClienteServicio::select('id', 'precio', 'servicio_id')->with('servicio')->get();

        return view('detalle_orden.create', compact('empleados', 'ordenes', 'servicios', 'especiales'));
    }

    public function store(Request $request)
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
=======
        $ordenes = AppOrden::collection(Orden::all());
        return view('orden.index', compact('ordenes'));
    }

   
    public function create()
    {
        $clientes = Cliente::select('id', 'nombres')->get();
        return view('orden.create', compact('clientes'));
    }

    public function store(OrdenRequest $request)
    {
        $cliente = Cliente::find($request->cliente_id);
        
        $orden = new Orden;
        
        $orden->nombre = $request->nombre;
        $orden->detalle = $request->detalle;
        $orden->fecha_entrada = $request->fecha_entrada;
        $orden->fecha_salida = $request->fecha_salida;

        $cliente->ordenes()->save($orden);

        return redirect()->route('orden.index')->with('success', 'ORDEN REGISTRADO CON EXITO!');
>>>>>>> origin/saenz
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $empleadoorden = EmpleadoOrden::find($id);
        $empleados = Empleado::select('id', 'nombres')->get();
        $ordenes = Orden::select('id', 'nombre')->get();
        

        return view('detalle_orden.edit', compact('empleadoorden', 'empleados', 'ordenes'));
    }

    public function update(Request $request, $id)
    {
        $detalle = EmpleadoOrden::find($id);

        $detalle->orden_id = $request->orden_id;
        $detalle->empleado_id = $request->empleado_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->estado = $request->estado;

        $detalle->update();

        return redirect()->route('empleadoorden.index')->with('success', 'ORDEN DE EMPLEADO ACTUALIZADO CON EXITO!');
=======
        $orden = new AppOrden(Orden::find($id));
        $clientes = Cliente::select('id', 'nombres')->get();
        
        return view('orden.edit', compact('orden', 'clientes'));
    }

    public function update(OrdenRequest $request, $id)
    {
        $orden =  Orden::find($id);

        $orden->update($request->all());

        return redirect()->route('orden.index')->with('success', 'ORDEN ACTUALIZADO CON EXITO!');
>>>>>>> origin/saenz
    }

    public function destroy($id)
    {
<<<<<<< HEAD
        $empleadoorden = EmpleadoOrden::find($id);
        $empleadoorden->delete();
        return redirect()->route('empleadoorden.index')->with('success', 'ORDEN DE EMPLEADO ELIMINADO CON EXITO!');
=======
        $orden = Orden::find($id);
        $orden->delete();
        return redirect()->route('orden.index')->with('success', 'ORDEN ELIMINADO CON EXITO!');
>>>>>>> origin/saenz
    }
}
