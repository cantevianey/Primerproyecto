<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pagina extends Model
{
    protected $table= 'paginas';

    protected function casts():array{
        return[
            'created_at'=>'datetime:d-m-y',
            'is_active'=>'boolean'
        ];
    }

    protected function name():Attribute{
        return Attribute::make(
            set: function($value){//Mutador
                return strtolower($value);
            },
            get:function($value){//Accesor
                return ucfirst($value);
            }
        );
    }

    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }


    public function BuscarId($id){
        $registro=Pagina::find($id);
        return $registro;
    }

    // Eliminación FÍSICA: borra el registro permanentemente de la base de datos
    public function EliminarFisico($id){
        $registro=Pagina::find($id);
        if(!empty($registro)){
            $registro->delete();
            return true;
        }
        return false;
    }
 
    // Eliminación LÓGICA: cambia is_active a false, el registro sigue en la BD
    public function EliminarLogico($id){
        $registro=Pagina::find($id);
        if(!empty($registro)){
            $registro->is_active=false;
            $registro->save();
            return $registro;
        }
        return false;
    }
}
