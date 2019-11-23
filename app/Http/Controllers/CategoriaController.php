<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:categoria-list');
        $this->middleware('permission:categoria-create', ['only' => ['create','store']]);
        $this->middleware('permission:categoria-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:categoria-delete', ['only' => ['destroy']]);
    }

public function index()
    {
        $categorias = Categoria::with('servicios:id,nombre,categoria_id')->get();
        return view('categoria.index', compact('categorias'));
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
        $categorias = Categoria::select('id', 'nombre')->get();
        return view('categoria.create', compact('categorias'));
    }
 public function store(Request $request)
    {
        if ($request->nombre) {

            $categoria = new Categoria;

            $categoria->nombre =  $request->nombre;
            $categoria->descripcion = $request->descripcion;

            $categoria->save();
        } else {
            $categoria = Categoria::find($request->categoria_id);
        }

         $servicio = new Servicio;

        $servicio->nombre = $request->nombre_servicio;
        $servicio->precio = $request->precio;
        $servicio->descripcion = $request->descripcion_servicio;

        $categoria->servicios()->save($servicio);

        return redirect()->route('categoria.index')->with('success', 'CATEGORIA REGISTRADO CON EXITO!');
    }


    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {

    	$categoria = Categoria::find($id);
        $categoria->nombre =  $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        $idservicios = $request->id_servicio;
        $nombres = $request->nombre_servicio;
        $precios = $request->precio;
        $descripciones = $request->descripcion_servicio;

        
        for ($i = 0; $i < count($idservicios); $i++) {
            $servicio = Servicio::find($idservicios[$i]);

            $servicio->nombre = $nombres[$i];
            $servicio->precio = $precios[$i];
            $servicio->descripcion = $descripciones[$i];

             $servicio->update();
        }

        return redirect()->route('categoria.index')->with('success', 'CATEGORIA ACTUALIZADO CON EXITO!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'CATEGORIA ELIMINADO CON EXITO!');
    }
}
