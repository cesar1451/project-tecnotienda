<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EtiquetaController;
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
    Route::get('/productos', [ProductoController::class, 'index']);
    Route::get('/productos/create', [ProductoController::class, 'create']);       
    Route::post('/producto', [ProductoController::class, 'store']); 
    //Etiquetas
    Route::get('/etiquetas', [EtiquetaController::class, 'index']);
    Route::get('/etiqueta/create', [EtiquetaController::class, 'create']);
    Route::post('/etiqueta', [EtiquetaController::class, 'store']);
    Route::delete('/etiqueta/{etiqueta}', [EtiquetaController::class, 'destroy']);     
    Route::get('/etiqueta/{etiqueta}/edit', [EtiquetaController::class, 'edit']);
    Route::patch('/etiqueta/{etiqueta}', [EtiquetaController::class, 'update']);    
});


Route::get('auth/facebook', [SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback', [SocialController::class, 'callbackFacebook']);