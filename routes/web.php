<?php

use App\Http\Controllers\ProductoController;
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
});