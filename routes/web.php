<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Siembra_de_peceController;
use App\Http\Controllers\Control_de_tanqueController;
use App\Http\Controllers\Medicion_de_parametroController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\Control_de_insumoController;
use App\Http\Controllers\DistribuidoraController;
use App\Http\Controllers\Control_de_sedimentoController;
use App\Http\Controllers\Control_de_pesoController;


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
    return view('/');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

//y creamos un grupo de rutas protegidas para los controladores
//Route::resource('blogs','App\Http\Controllers\ArticuloController');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    //Route::resource('blogs', BlogController::class);
    Route::resource('siembra_de_peces', Siembra_de_peceController::class);
    Route::resource('control_de_tanques', Control_de_tanqueController::class);
    Route::resource('medicion_de_parametros', Medicion_de_parametroController::class);
    Route::resource('climas', ClimaController::class);
    Route::resource('control_de_insumos', Control_de_insumoController::class);
    Route::resource('distribuidoras', DistribuidoraController::class);
    Route::resource('control_de_sedimentos', Control_de_sedimentoController::class);
    Route::resource('control_de_pesos', Control_de_pesoController::class);
});
