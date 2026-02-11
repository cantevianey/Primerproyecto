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
    return view('layouts.contact', ['nombre'=>$nombre, 'carrera'=>'Doctor en Sistemas Computacionesles']);
})->name('contact');

Route::get('/principal', function(){
    $datos = ["titulo"=>"Tienda Virtual - Vista Principal",
    "mensaje"=>"Bienvenido a la vista principal"];
    return view('principal', $datos);
})->name('principal');

Route::get('/empresa',[HomeController::class,'empresa'])->name('empresa');