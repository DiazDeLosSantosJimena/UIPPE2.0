<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\AreasUsuariosController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  Primer Pagina
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->to('dashboard');
    } else {
        return redirect()->to('login');
    }
})->name('/');

//  Login
Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::middleware('auth')->group(function () {
    //  Dashboard
    Route::name('dashboard')->get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::name('registrosA')->get('registrosA/{id}', [DashboardController::class, 'registrosArea']);
    Route::name('registros')->get('registros', [DashboardController::class, 'registros']);

    //  Areas
    Route::resource('areas', AreasController::class);
    Route::name('editArea')->put('editArea/{id}', [AreasController::class, 'edit']);
    Route::name('deleteArea')->put('deleteArea/{id}', [AreasController::class, 'destroy']);

    // Tipos
    Route::resource('tipos', TiposController::class);
    Route::name('editTip')->put('editTip/{id}', [TiposController::class, 'edit']);
    Route::name('deleteTip')->put('deleteTip/{id}', [TiposController::class, 'destroy']);

    //  Usuarios
    Route::resource('usuarios', UsuariosController::class);
    Route::name('editUsuario')->put('editUsuario/{id}', [UsuariosController::class, 'edit']);
    Route::name('deleteUsers')->put('deleteUsers/{id}', [UsuariosController::class, 'destroy']);
    Route::name('perfil')->get('perfil', [UsuariosController::class, 'perfil']);

    //  Áreas Usuarios
    Route::resource('areas-usuarios', AreasUsuariosController::class);
    Route::name('editAreaUser')->put('editAreaUser/{id}', [AreasUsuariosController::class, 'edit']);
    Route::name('deleteAreaUser')->delete('deleteAreaUser/{id}', [AreasUsuariosController::class, 'destroy']);
    Route::post('areauser/store', [AreasUsuariosController::class, 'store'])->name('areausuario.store');
});