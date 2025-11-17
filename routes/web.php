<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistorialServicioController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
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
//busca la ruta del controlador luego la vista
//Route::get( "/rol", [RolController::class, 'index'])-> name('index.rol');
// Route::get("/",  [AuthController::class, 'welcome'])->name( 'login');
Route::get("/",  [AuthController::class, 'welcome'])->name( 'paginas.panel');

//rutas de acceso de login y validacion con la base de datos
Route::get('/login',[Authcontroller::class,'loginView'])->name('login');
Route::post('/login',[Authcontroller::class,'login'])->name('sendlogin');
Route::get('/salidalogin',[Authcontroller::class,'loginSalida'])->name('outlogin');


///rutas con el middleware
Route::prefix('/rol')->middleware('rolmiddleware')->group( function (){
    Route::get( "/", [RolController::class, 'index'])->name('index.rol');
    //crear nuevo rol
    Route::get("/crear",[RolController::class,'indexStore'])->name('index.crear.rol');
    Route::post("/crear",[RolController::class,'store'])->name('crear.rol');

    //modificar rol
    Route::post("/modificar",[RolController::class,'indexUpdate'])->name('index.editar.rol');
    Route::post("/modificarPost",[RolController::class,'update'])->name('editar.rol');

    Route::post("/eliminar",[RolController::class,'destroy'])->name('eliminar.rol');
});
//Ruta permiso
Route::prefix('/permiso')->middleware('permisomiddleware')->group(function () {
    Route::get( "/", [PermisoController::class, 'index'])->name('index.permiso');
    Route::post( "/", [PermisoController::class, 'store'])->name('crear.permiso');
    Route::patch( "/", [PermisoController::class, 'update'])->name('editar.permiso');
    Route::delete("/", [PermisoController::class, 'destroy'])->name('eliminar.permiso');
});

//ruta usuario y su crud
Route::prefix('/usuario')->group(function(){
    Route::get("/",[UserController::class,'index'])->name('index.usuario');
    //crear nuevo usuario
    Route::get("/crear",[UserController::class,'indexStore'])->name('index.crear.usuario');
    Route::post("/crear",[UserController::class,'store'])->name('crear.usuario');

    //modificar usuario
    Route::post("/modificar",[UserController::class,'indexUpdate'])->name('index.editar.usuario');
    Route::post("/modificarPost",[UserController::class,'update'])->name('editar.usuario');

    Route::post("/eliminar",[UserController::class,'destroy'])->name('eliminar.usuario');
});

// CRUD de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('index.cliente');
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('index.crear.cliente');
Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

//creamos las rutas de los equipos
Route::prefix('/equipo')->group(function () {
    Route::get('/', [EquipoController::class, 'index'])->name('equipo.index');
    Route::get('/crear', [EquipoController::class, 'create'])->name('equipo.create');
    Route::post('/crear', [EquipoController::class, 'store'])->name('equipo.store');
    Route::get('/editar/{equipo}', [EquipoController::class, 'edit'])->name('equipo.edit');
    Route::patch('/editar/{equipo}', [EquipoController::class, 'update'])->name('equipo.update');
    Route::delete('/eliminar/{equipo}', [EquipoController::class, 'destroy'])->name('equipo.destroy');
});

//rutas de diagnostico
Route::prefix('/diagnostico')->middleware('permisomiddleware')->group(function () {
    Route::get('/', [DiagnosticoController::class, 'index'])->name('index.diagnostico');
    Route::get('/crear', [DiagnosticoController::class, 'create'])->name('index.crear.diagnostico');
    Route::post('/', [DiagnosticoController::class, 'store'])->name('crear.diagnostico');
    Route::get('/{diagnostico}/editar', [DiagnosticoController::class, 'edit'])->name('editar.diagnostico.form');
    Route::patch('/{diagnostico}', [DiagnosticoController::class, 'update'])->name('editar.diagnostico');
    Route::delete('/{diagnostico}', [DiagnosticoController::class, 'destroy'])->name('eliminar.diagnostico');
});
///rutas para servicio
Route::prefix('/servicio')->middleware('permisomiddleware')->group(function () {
    Route::get('/', [ServicioController::class, 'index'])->name('index.servicio');
    Route::get('/crear', [ServicioController::class, 'create'])->name('crear.servicio');
    Route::post('/', [ServicioController::class, 'store'])->name('guardar.servicio');
    Route::get('/{servicio}/editar', [ServicioController::class, 'edit'])->name('editar.servicio.form');
    Route::patch('/{servicio}', [ServicioController::class, 'update'])->name('editar.servicio');
    Route::delete('/{servicio}', [ServicioController::class, 'destroy'])->name('eliminar.servicio');
});
//Ventas
Route::prefix('ventas')
    ->middleware(['auth', 'rolmiddleware:administrador,tecnico'])
    ->group(function () {
        Route::get('/', [VentaController::class, 'index'])->name('venta.index');
        Route::get('/crear', [VentaController::class, 'create'])->name('venta.create');
        Route::post('/', [VentaController::class, 'store'])->name('venta.store');
        Route::get('/{id}/editar', [VentaController::class, 'edit'])->name('venta.edit');
        Route::patch('/{id}', [VentaController::class, 'update'])->name('venta.update');
        Route::delete('/{id}', [VentaController::class, 'destroy'])->name('venta.destroy');
    });

//Rutas para historial de servicio
Route::prefix('historial_servicio')->group(function () {
    Route::get("/", [HistorialServicioController::class, 'index'])->name('index.historial_servicio');
    Route::get("/crear", [HistorialServicioController::class, 'create'])->name('crear.historial_servicio.form');
    Route::post("/", [HistorialServicioController::class, 'store'])->name('crear.historial_servicio');
    Route::get("/editar/{id}", [HistorialServicioController::class, 'edit'])->name('editar.historial_servicio.form');
    Route::patch("/{id}", [HistorialServicioController::class, 'update'])->name('editar.historial_servicio');
    Route::delete("/{id}", [HistorialServicioController::class, 'destroy'])->name('eliminar.historial_servicio');
});
//Productos
Route::prefix('/producto')->middleware('permisomiddleware')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('index.producto');
    Route::get('/crear', [ProductoController::class, 'create'])->name('index.crear.productos');
    Route::post('/', [ProductoController::class, 'store'])->name('crear.producto');
    Route::get('/{producto}/editar', [ProductoController::class, 'edit'])->name('editar.producto.form');
    Route::patch('/{producto}', [ProductoController::class, 'update'])->name('editar.producto');
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('eliminar.producto');
});
//Categoria
Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('index.categoria');
    Route::get('/crear', [CategoriaController::class, 'create'])->name('crear.categoria.form');
    Route::post('/', [CategoriaController::class, 'store'])->name('crear.categoria');
    Route::get('/editar/{id}', [CategoriaController::class, 'edit'])->name('editar.categoria.form');
    Route::patch('/{id}', [CategoriaController::class, 'update'])->name('editar.categoria');
    Route::delete('/{id}', [CategoriaController::class, 'destroy'])->name('eliminar.categoria');
});
