<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// RUTA PRINCIPAL PAGINA
Route::get('/', [App\Http\Controllers\webController::class, 'index'])->name('index');

Auth::routes();

// RUTA PRINCIPAL
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTA PARA EL ADMIN
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// RUTA PARA EL MODULO CONFIGURACION
Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracioneController::class, 'index'])->name('admin.configuracion.index')->middleware('auth', 'can:admin.configuracion.index');
// RUTA PARA CONFIGURACION
Route::get('/admin/configuracion/create', [App\Http\Controllers\ConfiguracioneController::class, 'create'])->name('admin.configuracion.create')->middleware('auth', 'can:admin.configuracion.create');
// RUTA PARA CONFIGURACION - GUARDAR DATOS
Route::post('/admin/configuracion/create', [App\Http\Controllers\ConfiguracioneController::class, 'store'])->name('admin.configuracion.store')->middleware('auth', 'can:admin.configuracion.store');
// RUTA PARA MOSTRAR CONFIGURACION
Route::get('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'show'])->name('admin.configuracion.show')->middleware('auth', 'can:admin.configuracion.show');
// RUTA PARA EDITAR CONFIGURACION
Route::get('/admin/configuracion/{id}/edit', [App\Http\Controllers\ConfiguracioneController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth', 'can:admin.configuracion.edit');
// RUTA PARA ACTUALIZAR CONFIGURACION
Route::put('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'update'])->name('admin.configuracion.update')->middleware('auth', 'can:admin.configuracion.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR CONFIGURACION
Route::get('/admin/configuracion/{id}/confirm-delete', [App\Http\Controllers\ConfiguracioneController::class, 'confirmDelete'])->name('admin.configuracion.confirmDelete')->middleware('auth', 'can:admin.configuracion.confirmDelete');
// RUTA PARA ELIMINAR CONFIGURACION
Route::delete('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth', 'can:admin.usuarios.destroy');

// RUTA PARA EL MODULO USUARIO
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth', 'can:admin.usuarios.index');
// RUTA PARA EL USUARIO - CREAR USUARIO
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth', 'can:admin.usuarios.create');
// RUTA PARA EL USUARIO - CREAR USUARIO - GUARDAR DATOS
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth', 'can:admin.usuarios.store');
// RUTA PARA MOSTRAR USUARIO
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth', 'can:admin.usuarios.show');
// RUTA PARA EDITAR USUARIO
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth', 'can:admin.usuarios.edit');
// RUTA PARA ACTUALIZAR USUARIO
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth', 'can:admin.usuarios.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR USUARIO
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth', 'can:admin.usuarios.confirmDelete');
// RUTA PARA ELIMINAR USUARIO
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth', 'can:admin.usuarios.destroy');

// RUTA PARA EL MODULO SECRETARIA
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth', 'can:admin.secretarias.index');
// RUTA PARA SECRETARIA - CREAR SECRETARIA
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth', 'can:admin.secretarias.create');
// RUTA PARA SECRETARIA - CREAR SECRETARIA - GUARDAR DATOS
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth', 'can:admin.secretarias.store');
// RUTA PARA MOSTRAR SECRETARIA
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth', 'can:admin.secretarias.show');
// RUTA PARA EDITAR SECRETARIA
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth', 'can:admin.secretarias.edit');
// RUTA PARA ACTUALIZAR SECRETARIA
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth', 'can:admin.secretarias.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR SECRETARIA
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth', 'can:admin.secretarias.confirmDelete');
// RUTA PARA ELIMINAR SECRETARIA
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth', 'can:admin.secretarias.destroy');

// RUTA PARA EL MODULO PACIENTE
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth', 'can:admin.pacientes.index');
// RUTA PARA PACIENTE - CREAR PACIENTE
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth', 'can:admin.pacientes.create');
// RUTA PARA PACIENTE - CREAR PACIENTE - GUARDAR DATOS
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth', 'can:admin.pacientes.store');
// RUTA PARA MOSTRAR PACIENTE
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth', 'can:admin.pacientes.show');
// RUTA PARA EDITAR PACIENTE
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth', 'can:admin.pacientes.edit');
// RUTA PARA ACTUALIZAR PACIENTE
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth', 'can:admin.pacientes.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR PACIENTE
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth', 'can:admin.pacientes.confirmDelete');
// RUTA PARA ELIMINAR PACIENTE
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth', 'can:admin.pacientes.destroy');

// RUTA PARA EL MODULO CONSULTORIO
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth', 'can:admin.consultorios.index');
// RUTA PARA CONSULTORIO - CREAR CONSULTORIO
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth', 'can:admin.consultorios.create');
// RUTA PARA CONSULTORIO - CREAR CONSULTORIO - GUARDAR DATOS
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth', 'can:admin.consultorios.store');
// RUTA PARA CONSULTORIO CONSULTORIO
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth', 'can:admin.consultorios.show');
// RUTA PARA EDITAR CONSULTORIO
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth', 'can:admin.consultorios.edit');
// RUTA PARA ACTUALIZAR CONSULTORIO
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth', 'can:admin.consultorios.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR CONSULTORIO
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware('auth', 'can:admin.consultorios.confirmDelete');
// RUTA PARA ELIMINAR CONSULTORIO
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth', 'can:admin.consultorios.destroy');

// RUTA PARA EL MODULO DOCTORES
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth', 'can:admin.doctores.index');
// RUTA PARA DOCTORES - CREAR DOCTORES
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth', 'can:admin.doctores.create');
// RUTA PARA DOCTORES - CREAR DOCTORES - GUARDAR DATOS
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth', 'can:admin.doctores.store');
// RUTA PARA EL MODULO DOCTORES/REPORTES
Route::get('/admin/doctores/reportes', [App\Http\Controllers\DoctorController::class, 'reportes'])->name('admin.doctores.reportes')->middleware('auth', 'can:admin.doctores.reportes');
Route::get('/admin/doctores/pdf', [App\Http\Controllers\DoctorController::class, 'pdf'])->name('admin.doctores.pdf')->middleware('auth', 'can:admin.doctores.pdf');
// RUTA PARA DOCTORES
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth', 'can:admin.doctores.show');
// RUTA PARA EDITAR DOCTORES
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth', 'can:admin.doctores.edit');
// RUTA PARA ACTUALIZAR DOCTORES
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth', 'can:admin.doctores.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR DOCTORES
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware('auth', 'can:admin.doctores.confirmDelete');
// RUTA PARA ELIMINAR DOCTORES
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth', 'can:admin.doctores.destroy');

// RUTA PARA EL MODULO HORARIOS
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth', 'can:admin.horarios.index');
// RUTA PARA HORARIOS - CREAR HORARIOS
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth', 'can:admin.horarios.create');
// RUTA PARA HORARIOS - CREAR HORARIOS - GUARDAR DATOS
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth', 'can:admin.horarios.store');
// RUTA PARA HORARIOS
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth', 'can:admin.horarios.show');
// RUTA PARA EDITAR HORARIOS
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth', 'can:admin.horarios.edit');
// RUTA PARA ACTUALIZAR HORARIOS
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth', 'can:admin.horarios.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR HORARIOS
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware('auth', 'can:admin.horarios.confirmDelete');
// RUTA PARA ELIMINAR HORARIOS
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth', 'can:admin.horarios.destroy');

// RUTA TIPO AJAX 
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('auth', 'can:admin.horarios.cargar_datos_consultorios');

// RUTA TIPO AJAX CONSULTORIOS PARA EL USUARIO
Route::get('/consultorios/{id}', [App\Http\Controllers\webController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios')->middleware('auth', 'can:cargar_datos_consultorios');
Route::get('/cargar_reserva_doctores/{id}', [App\Http\Controllers\webController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->middleware('auth', 'can:cargar_reserva_doctores');
Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.create')->middleware('auth', 'can:admin.eventos.create');
Route::get('/admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('ver_reservas')->middleware('auth', 'can:ver_reservas');
Route::delete('/admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth', 'can:admin.eventos.destroy');

// RUTAS PARA LAS RESERVAS
Route::get('/admin/reservas/reportes/', [App\Http\Controllers\EventController::class, 'reportes'])->name('admin.reservas.reportes')->middleware('auth', 'can:admin.reservas.reportes');
Route::get('/admin/reservas/pdf/', [App\Http\Controllers\EventController::class, 'pdf'])->name('admin.reservas.pdf')->middleware('auth', 'can:admin.reservas.pdf');
Route::get('/admin/reservas/pdf_fechas/', [App\Http\Controllers\EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas')->middleware('auth', 'can:admin.reservas.pdf_fechas');

// RUTAS PARA EL HISTORIAL CLINICO
// RUTA PARA EL MODULO HISTORIAL
Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index')->middleware('auth', 'can:admin.historial.index');
// RUTA PARA DOCTORES - CREAR HISTORIAL
Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create')->middleware('auth', 'can:admin.historial.create');
// RUTA PARA DOCTORES - CREAR HISTORIAL - GUARDAR DATOS
Route::post('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store')->middleware('auth', 'can:admin.historial.store');
// RUTA PARA EL MODULO HISTORIAL/REPORTES
Route::get('/admin/historial/pdf/{id}', [App\Http\Controllers\HistorialController::class, 'pdf'])->name('admin.historial.pdf')->middleware('auth', 'can:admin.historial.pdf');
// RUTA PARA EL MODULO HISTORIAL/BUSCAR REPORTE
Route::get('/admin/historial/buscar_paciente', [App\Http\Controllers\HistorialController::class, 'buscar_paciente'])->name('admin.historial.buscar_paciente')->middleware('auth', 'can:admin.historial.buscar_paciente');
// RUTA PARA EL MODULO HISTORIAL/IMPRIMIR HISTORIAL
Route::get('/admin/historial/paciente/{id}', [App\Http\Controllers\HistorialController::class, 'imprimir_historial'])->name('admin.historial.imprimir_historial')->middleware('auth', 'can:admin.historial.imprimir_historial');
// RUTA PARA HISTORIAL
Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show')->middleware('auth', 'can:admin.historial.show');
// RUTA PARA EDITAR HISTORIAL
Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit')->middleware('auth', 'can:admin.historial.edit');
// RUTA PARA ACTUALIZAR HISTORIAL
Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update')->middleware('auth', 'can:admin.historial.update');
// RUTA PARA CONFIRMAR ANTES DE ELIMINAR HISTORIAL
Route::get('/admin/historial/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])->name('admin.historial.confirmDelete')->middleware('auth', 'can:admin.historial.confirmDelete');
// RUTA PARA ELIMINAR HISTORIAL
Route::delete('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'destroy'])->name('admin.historial.destroy')->middleware('auth', 'can:admin.historial.destroy');

// RUTAS PARA EL PAGO
// RUTA PARA EL MODULO PAGO
Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth', 'can:admin.pagos.index');
Route::get('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pagos.create')->middleware('auth', 'can:admin.pagos.create');
Route::post('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth', 'can:admin.pagos.store');
Route::get('/admin/pagos/pdf/{id}', [App\Http\Controllers\PagoController::class, 'pdf'])->name('admin.pagos.pdf')->middleware('auth', 'can:admin.pagos.pdf');
Route::get('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'show'])->name('admin.pagos.show')->middleware('auth', 'can:admin.pagos.show');
Route::get('/admin/pagos/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('admin.pagos.edit')->middleware('auth', 'can:admin.pagos.edit');
Route::put('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('admin.pagos.update')->middleware('auth', 'can:admin.pagos.update');
Route::get('/admin/pagos/{id}/confirm-delete', [App\Http\Controllers\PagoController::class, 'confirmDelete'])->name('admin.pagos.confirmDelete')->middleware('auth', 'can:admin.pagos.confirmDelete');
Route::delete('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth', 'can:admin.pagos.destroy');
