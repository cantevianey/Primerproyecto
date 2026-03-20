<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipalController;
use App\Models\Pagina;


/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
    return view('welcome');
})->name('vista_inicio');

Route::get('/hello', HomeController::class);
Route::get('post/mensaje',[PostController::class, 'Mensaje']);
Route::get('post/about/{param?}/{nombre?}',[PostController::class, 'About']);


Route::get('/contact', function(){
    $nombre = "Vianey Guadalupe Cante Cab";
    return view('contact', [
        'nombre' => $nombre, 
        'carrera' => 'Doctor en Sistemas Computacionales'
    ]);
})->name('contact');

Route::get('/principal', function(){
    $datos = ["titulo"=>"Tienda Virtual - Vista Principal",
    "mensaje"=>"Bienvenido a la vista principal"];
    return view('principal', $datos);
})->name('principal');

Route::get('/empresa',[HomeController::class,'empresa'])->name('empresa');

Route::get('nuevoregistro', function(){
$pagina=new Pagina;
$pagina->name='CARLOS';
$pagina->email='maria4@gmail.com';
$pagina->email_verified_at=date('Y-m-d');
$pagina->password='123456';
$pagina->avatar='user.png';
$pagina->telefono='999999';
$pagina->calle='89';
$pagina->save();
return $pagina;
});

Route::get('buscarpaginaid', function(){
    $post=Pagina::find(1);
    return $post;
});

Route::get ('buscarxname', function(){
    $post=Pagina::where('name','carlos')->first();
    return $post;
});

Route::get('obtenertodos', function(){
    $post=Pagina::all();
    return $post;
});

Route::get('updatename',function(){
    $post=Pagina::where('name','CARLOS')->first();
    $post->email='agongoraescalante125@gmail.com';
    $post->save();
    return $post;
});

Route::get('filter',function(){
    $posts=Pagina::where('calle','like','%78%')->get();
    return $posts;
});

Route::get('trescampos',function(){
    $posts=Pagina::select('name','email','telefono')->get();
    return $posts;
});

Route::get('filtroxnumreg', function(){
    $post=Pagina::select("name","email")->orderBy("name")->take(2)->get();
    return $post;
});

Route::get('eliminar_registro', function(){
    $post=Pagina:: find(5);
    $post->delete();
    return "Eliminado";
});

//Obtener la fecha conforme a un formato
Route::get('Obtenerfechaformato',function(){
$post=Pagina::select("name","email","created_at")->find(3);
//return $post->created_at->format('d-m-Y');
//return $post->created_at->format('d/m/Y');
return $post;
});

//Obtener el valor de is_active
Route::get('Obtenerestatus', function(){
$post=Pagina :: find(1);
//return $post->created_at->format('d-m-Y');
//return $post->is_active;
// dd función de depuración que muestra el contenido de una variable
dd($post->is_active);
});

Route::put('/actualizar-dato/{id}',[HomeController::class,'update'])->name('dato.update');

// Ruta para eliminación FÍSICA (DELETE permanente)
Route::delete('/eliminar-fisico/{id}',[HomeController::class,'destroyFisico'])->name('dato.destroyFisico');
 
// Ruta para eliminación LÓGICA (desactivar is_active)
Route::put('/eliminar-logico/{id}',[HomeController::class,'destroyLogico'])->name('dato.destroyLogico');