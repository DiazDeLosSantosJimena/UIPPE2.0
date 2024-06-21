<?php
use App\Http\Controllers\AreasController;
use App\Http\Controllers\AreasMetasController;
use App\Http\Controllers\AreasUsuariosController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CalendarizarsController;
use App\Http\Controllers\CorreosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\ProgramasController;
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
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//  Correos
Route::name('recuperacion')->get('recuperacion', [CorreosController::class, 'recuperar']);
Route::name('EnviarCorreo')->get('EnviarCorreo', [CorreosController::class, 'EnviarCorreo2']);
Route::name('reset')->get('reset', [CorreosController::class, 'reset'])->middleware('signed');
Route::name('passwordc')->get('passwordc', [CorreosController::class, 'passwordc']);
Route::name('correo')->get('enviados', [CorreosController::class, 'enviados']);
Route::name('pcorreo')->get('pcorreo', [CorreosController::class, 'pcorreo']);
Route::name('prueba')->get('prueba', [CorreosController::class, 'prueba']);

Route::middleware('auth')->group(function () {

    //  Dashboard
    Route::name('dashboard')->get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::name('registrosA')->get('registrosA/{id}', [DashboardController::class, 'registrosArea'])->middleware('registrosAreasMiddleware:id', 'areausuario');
    Route::name('registros')->get('registros', [DashboardController::class, 'registros']);

    //  Areas
    Route::resource('areas', AreasController::class)->middleware('role');
    Route::name('editArea')->put('editArea/{id}', [AreasController::class, 'edit']);
    Route::name('deleteArea')->put('deleteArea/{id}', [AreasController::class, 'destroy']);

    // Tipos
    Route::resource('tipos', TiposController::class)->middleware('role');
    Route::name('editTip')->put('editTip/{id}', [TiposController::class, 'edit']);
    Route::name('deleteTip')->put('deleteTip/{id}', [TiposController::class, 'destroy']);

    //  Usuarios
    Route::resource('usuarios', UsuariosController::class)->middleware('role');
    Route::name('editUsuario')->put('editUsuario/{id}', [UsuariosController::class, 'edit']);
    Route::name('deleteUsers')->put('deleteUsers/{id}', [UsuariosController::class, 'destroy']);
    Route::name('perfil')->get('perfil', [UsuariosController::class, 'perfil']);
    /*
        Rutas para la edición de perfil de los usuarios
    */
    Route::name('perfil')->get('perfil', [AuthController::class, 'perfil']);
    Route::name('EditarPerfil')->get('EditarPerfil', [AuthController::class, 'updateView']);
    Route::name('EditPerfil')->put('EditPerfil/{id}', [AuthController::class, 'update']);

    //  Áreas Usuarios
    Route::resource('areas-usuarios', AreasUsuariosController::class)->middleware('role');
    Route::name('editAreaUser')->put('editAreaUser/{id}', [AreasUsuariosController::class, 'edit']);
    Route::name('deleteAreaUser')->delete('deleteAreaUser/{id}', [AreasUsuariosController::class, 'destroy']);
    Route::post('areauser/store', [AreasUsuariosController::class, 'store'])->name('areausuario.store');

    //  Programas
    Route::resource('programas', ProgramasController::class)->middleware('role');
    Route::name('editProgram')->put('editProgram/{id}', [ProgramasController::class, 'edit']);
    Route::name('deleteProgram')->put('deleteProgram/{id}', [ProgramasController::class, 'destroy']);

    //   Metas
    Route::resource('metas', MetasController::class)->middleware('role');
    Route::name('deleteMeta')->put('deleteMeta/{id}', [MetasController::class, 'destroy']);
    Route::name('editMeta')->put('editMeta/{id}', [MetasController::class, 'edit']);

    //   Áreas Metas
    Route::resource('areasmetas', AreasMetasController::class)->middleware('role');
    Route::name('multi')->get('multi',  [AreasMetasController::class, 'index']);
    Route::name('editAreaMeta')->put('editAreaMeta/{id}', [AreasMetasController::class, 'edit']);
    //  MULTI-SELECTS START ----------------------------
    Route::name('js_metas')->get('js_metas', [AreasMetasController::class, 'js_metas']);
    Route::name('js_areas')->get('js_areas', [AreasMetasController::class, 'js_areas']);
    //  MULTI-SELECTS END   ----------------------------

    //  Calendario
    Route::resource('calendarizars', CalendarizarsController::class);
    Route::name('calendario')->get('calendario', [CalendarizarsController::class, 'index'])->middleware('check');
    Route::name('calendUpdate')->put('calendUpdate/{id}', [CalendarizarsController::class, 'update']);
    Route::name('entregaMetas')->get('entregaMetas', [CalendarizarsController::class, 'entregasView']);
    Route::name('entregasNew')->post('entregasNew', [CalendarizarsController::class, 'entregaN']);
    Route::name('entregasUpdate')->put('entregasUpdate/{id}', [CalendarizarsController::class, 'updateEntrega']);

    //  Gráficos
    Route::name('graficos')->get('graficos', [GraficosController::class, 'graficos']);
    Route::name('rpdf')->get('rpdf', [GraficosController::class, 'rpdf']);

    //  PDF y excel
    //  Documentos PDF START----------------------------
    Route::name('pdfAreas')->get('pdfAreas', [DocsController::class, 'pdfAreas']);
    Route::name('pdfam')->get('pdfam', [DocsController::class, 'pdfAreasMetas']);
    Route::name('pdft')->get('pdft', [DocsController::class, 'pdfTipos']);
    Route::name('pdfu')->get('pdfu', [DocsController::class, 'pdfUsuarios']);
    Route::name('pdfau')->get('pdfau', [DocsController::class, 'pdfAreasUsuarios']);
    Route::name('pdfp')->get('pdfp', [DocsController::class, 'pdfProgramas']);
    Route::name('pdfmetas')->get('pdfmetas', [DocsController::class, 'pdfMetas']);
    //  Documentos PDF END----------------------------

    //  Documentos Excel START----------------------------
    Route::controller(DocsController::class)->group(function () {
        Route::name('areas.export')->get('areas-export', 'exportAreas');
    });

    Route::controller(DocsController::class)->group(function () {
        Route::name('areasmetas.export')->get('areasmetas-export', 'exportAreasMetas');
    });

    Route::controller(DocsController::class)->group(function () {
        Route::name('tipos.export')->get('tipos-export', 'exportTipos');
    });
    Route::controller(DocsController::class)->group(function () {
        Route::name('usuarios.export')->get('usuarios-export', 'exportUsuarios');
    });

    Route::controller(DocsController::class)->group(function () {
        Route::name('areasusuarios.export')->get('areasusuarios-export', 'exportAreasUsuarios');
    });

    Route::controller(DocsController::class)->group(function () {
        Route::name('programas.export')->get('programas-export', 'exportProgramas');
    });

    Route::controller(DocsController::class)->group(function () {
        Route::name('metas.export')->get('metas-export', 'exportMetas'); //  Route::name('metas.export')->get('metas-export', 'exportMetas');
    });
    //  Documentos Excel END----------------------------

});
