<?php

namespace App\Http\Controllers;


use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\DataTables;


class HomeController extends Controller
{
    public function empresa(){
        $datos["nombre"]="Vianey Guadalupe Cante Cab";
        $datos["fecha"]="2026-02-03";
        $datos["actividad"]="Desarollo de Software";
        $datos["descripcion_about"]="Empresa dedicada al desarrollo de software a la medida de sus clientes";
        $datos["texto_ejemplo"]="Aquí va la descripción del texto de ejemplo";

        $usuarios=new Pagina();
        $datos["listadousuarios"]=$usuarios->ObtenerListado();
        return view('empresa',$datos);
    }

    public function __invoke(){
        return view('hello');
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

    // Eliminación FÍSICA: borra el registro de la base de datos permanentemente
    public function destroyFisico($id){
        $usuarios=new Pagina();
        $resultado=$usuarios->EliminarFisico($id);
        if($resultado){
            return response()->json(['mensaje'=>'Registro eliminado físicamente','status'=>'ok']);
        }
        return response()->json(['mensaje'=>'Registro no encontrado','status'=>'error'],404);
    }
 
    // Eliminación LÓGICA: desactiva el registro (is_active = false), no lo borra
    public function destroyLogico($id){
        $usuarios=new Pagina();
        $resultado=$usuarios->EliminarLogico($id);
        if($resultado){
            return response()->json(['mensaje'=>'Registro desactivado lógicamente','status'=>'ok','registro'=>$resultado]);
        }
        return response()->json(['mensaje'=>'Registro no encontrado','status'=>'error'],404);
    }
}   