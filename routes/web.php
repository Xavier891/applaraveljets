<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudioController;
use App\Models\Paciente;


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

//Route::get('/', function(){
//    return view ('vista1');
//});

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('pacientes', 'App\Http\Controllers\PacienteController');
Route::get('/pacientes-pdf', [PacienteController::class, 'reportePDF']);

Route::resource('doctores', 'App\Http\Controllers\DoctorController');
Route::get('/doctores-pdf', [DoctorController::class, 'reportePDF']);

Route::resource('deptos', 'App\Http\Controllers\DeptoController');
Route::get('/deptos-pdf', [DeptoController::class, 'reportePDF']);

Route::resource('empresas', 'App\Http\Controllers\EmpresaController');
Route::get('/empresas-pdf', [EmpresaController::class, 'reportePDF']);

Route::resource('estudios', 'App\Http\Controllers\EstudioController');
Route::get('/estudios-pdf', [EstudioController::class, 'reportePDF']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
