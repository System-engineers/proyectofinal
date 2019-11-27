<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Http\Requests\EmpleadoRequest;
use App\Http\Resources\Empleado as AppEmpleado;
>>>>>>> origin/saenz
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:empleado-list');
        $this->middleware('permission:empleado-create', ['only' => ['create','store']]);
        $this->middleware('permission:empleado-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empleado-delete', ['only' => ['destroy']]);
    
    }

    public function index()
    {
<<<<<<< HEAD
        $empleados = Empleado::all();
        return view('empleado.index', compact('empleados'));
    }

    public function show($id)
    {
        if (request()->ajax()) {
            $categoria = Empleado::find($id);
            return response()->view('ajax.detalle_categoria', compact('categoria'));
        } else {
            abort(401, 'Acceso Ilegal');
        }
    }

=======
        $empleados = AppEmpleado::collection(Empleado::all());
        return view('empleado.index', compact('empleados'));
    }

    
>>>>>>> origin/saenz
    public function create()
    {
        return view('empleado.create');
    }

<<<<<<< HEAD
    public function store(Request $request)
=======
    public function store(EmpleadoRequest $request)
>>>>>>> origin/saenz
    {

        Empleado::create($request->all());

        return redirect()->route('empleado.index')->with('success', 'EMPLEADO REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $empleado = Empleado::find($id);
=======
        $empleado = new AppEmpleado(Empleado::find($id));
>>>>>>> origin/saenz

        return view('empleado.edit', compact('empleado'));
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
=======
    public function update(EmpleadoRequest $request, $id)
>>>>>>> origin/saenz
    {
        $empleado =  Empleado::find($id);

        $empleado->update($request->all());

        return redirect()->route('empleado.index')->with('success', 'EMPLEADO ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleado.index')->with('success', 'EMPLEADO ELIMINADO CON EXITO!');
    }
}
