<?php

namespace App\Http\Controllers;


use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('hello');
    }
    public function empresa(){
        $datos["nombre"]="Vianey Guadalupe Cante Cab";
        $datos["fecha"]="2026-12-15";
        $datos["actividad"]="Desarrollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";

        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa', $datos);
    }

    public function update(Request $request){
        $usuarios=new Pagina();
        $respuesta=$usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name=$request->name;
            $respuesta->calle=$request->calle;
            $respuesta->save();
        }
        return $respuesta;
    }
}
