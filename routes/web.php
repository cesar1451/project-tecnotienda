<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use App\Models\Archivo;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {  
    //Productos     
    Route::resource('productos', ProductoController::class);
    //Etiquetas
    Route::resource('etiquetas', EtiquetaController::class);
     
    /* //Archivos
    Route::post('archivo', [ArchivoController::class, 'store'])->name('archivo.store'); */
});

//Vista de usuario
Route::get('/usuarios', function(){
    $productos = Producto::with('etiquetas', 'archivos')->get();   
    return view('usuarios.usuarios-index', ['productos' => $productos]);
});

Route::get('auth/facebook', [SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'callbackFacebook']);