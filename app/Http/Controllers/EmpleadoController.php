<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Http\Resources\Empleado as AppEmpleado;
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
        $empleados = AppEmpleado::collection(Empleado::all());
        return view('empleado.index', compact('empleados'));
    }

    
    public function create()
    {
        return view('empleado.create');
    }

    public function store(EmpleadoRequest $request)
    {

        Empleado::create($request->all());

        return redirect()->route('empleado.index')->with('success', 'EMPLEADO REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $empleado = new AppEmpleado(Empleado::find($id));

        return view('empleado.edit', compact('empleado'));
    }

    public function update(EmpleadoRequest $request, $id)
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
