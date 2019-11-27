<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:cliente-list');
        $this->middleware('permission:cliente-create', ['only' => ['create','store']]);
        $this->middleware('permission:cliente-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
    
    }

    public function index()
    {
        $clientes = Cliente::has('servicios')->with('servicios')->get();
        return view('cliente.index', compact('clientes'));
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
        $clientes = Cliente::select('id', 'nombres')->get();
        $servicios = Servicio::select('id', 'nombre', 'precio')->get();

        return view('cliente.create', compact('clientes', 'servicios'));
    }

    public function store(Request $request)
    {

        $cliente =  Cliente::find($request->cliente_id);

        $servicios = $request->servicios;
        $precios = $request->precios;

        foreach ($precios as $clave => $valor) {
            if (empty($valor)) unset($precios[$clave]);
        }


        $listRegenerado = array_merge($precios);



        for ($i = 0; $i < count($servicios); $i++) {
            $cliente->servicios()->attach([$request->servicios[$i]], ['precio' => $listRegenerado[$i]]);
        }
        return redirect()->route('cliente.index')->with('success', 'CLIENTE Y SERVICIOS REGISTRADO CON EXITO!');
    }

    public function edit($id)
    {
        $servicios = Servicio::select('id', 'nombre', 'precio')->get();
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        $cliente =  Cliente::find($id);

        $servicios = $request->servicios;
        $precios = $request->precios;

        foreach ($precios as $clave => $valor) {
            if (empty($valor)) unset($precios[$clave]);
        }

        $listRegenerado = array_merge($precios);

        $cliente->servicios()->detach();
        for ($i = 0; $i < count($servicios); $i++) {
            $cliente->servicios()->attach([$request->servicios[$i]], ['precio' => $listRegenerado[$i]]);
        }

        return redirect()->route('cliente.index')->with('success', 'CLIENTE Y SERVICIOS ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->servicios()->detach();
        return redirect()->route('cliente.index')->with('success', 'CLIENTE Y SERVICIOS ELIMINADO CON EXITO!');
    }
}