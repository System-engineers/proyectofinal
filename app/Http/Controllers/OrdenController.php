<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenRequest;
use App\Http\Resources\Orden as AppOrden;
use App\Models\Cliente;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:orden-list');
        $this->middleware('permission:orden-create', ['only' => ['create','store']]);
        $this->middleware('permission:orden-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:orden-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
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
    }

    public function edit($id)
    {
        $orden = new AppOrden(Orden::find($id));
        $clientes = Cliente::select('id', 'nombres')->get();
        
        return view('orden.edit', compact('orden', 'clientes'));
    }

    public function update(OrdenRequest $request, $id)
    {
        $orden =  Orden::find($id);

        $orden->update($request->all());

        return redirect()->route('orden.index')->with('success', 'ORDEN ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $orden = Orden::find($id);
        $orden->delete();
        return redirect()->route('orden.index')->with('success', 'ORDEN ELIMINADO CON EXITO!');
    }
}
