<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExportController;

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
    return view('auth.login');
});

/* PDF */ 
Route::get('detalleventas/pdf', [App\Http\Controllers\DetalleventaController::class, 'pdf'])->name('detalleventas.pdf');


Route::post('/ventas/{id}/boleta', [App\Http\Controllers\VentaController::class, 'boleta'])->name('ventas.boleta');

/* Excel*/ 

Route::get('detalleventas/export', [App\Http\Controllers\DetalleventaController::class, 'export'])->name('detalleventas.export');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::group(['middleware' => ['auth']], function () { 
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('categorias',App\Http\Controllers\CategoriaController::class);
    Route::resource('productos',App\Http\Controllers\ProductoController::class);

    Route::resource('clientes',App\Http\Controllers\ClienteController::class);

    Route::resource('empleados',App\Http\Controllers\EmpleadoController::class);
    Route::resource('marcas',App\Http\Controllers\MarcaController::class);
    Route::resource('proveedors',App\Http\Controllers\ProveedorController::class);
   Route::resource('pedidos',App\Http\Controllers\PedidoController::class);
   Route::resource('detallepedidos',App\Http\Controllers\DetallepedidoController::class);
   Route::resource('documentos',App\Http\Controllers\DocumentoController::class);

   Route::resource('ventas',App\Http\Controllers\VentaController::class);

   Route::resource('detalleventas',App\Http\Controllers\DetalleventaController::class);
   Route::resource('almacens',App\Http\Controllers\AlmacenController::class);
   Route::resource('registros',App\Http\Controllers\RegistroController::class);

   
   

});