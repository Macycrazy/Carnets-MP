<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\procesos;
use App\Http\Controllers\QrCodeController;

/*Route::get('/', function () {
    return view('index');
});*/



Route::get('/', [procesos::class, 'index'])->name('index');

Route::post('/sendMessage_{receptor}_{mensaje}_{foto}_{tipo}', [procesos::class, 'reportMessages'])->name('reportar');

Route::post('/telegram/send', [TelegramController::class, 'sendMessage']);

Route::get('/check-new-messages', [procesos::class, 'checkNewMessages'])->name('check-new-messages');

Route::get('/get-users-status', [procesos::class, 'getUsersStatus']);


Route::get('/messages/{userId}', [procesos::class, 'getMessages']);

Route::get('/prueba', [procesos::class, 'prueba'])->name('prueba');

Route::get('/mensajes', [procesos::class, 'mensajes'])->name('mensajes');

Route::post('/send', [procesos::class, 'send'])->name('send');

Route::post('/', [procesos::class, 'login'])->name('login');

Route::post('/registrar', [procesos::class, 'registrar'])->name('registrar');

Route::post('/logout', [procesos::class, 'logout'])->name('logout');

Route::get('/descargar', [procesos::class, 'descargar'])->name('descargar');

Route::get('/descargar_imagen_{id}', [procesos::class, 'descargar_imagen'])->name('descargar_imagen');




Route::get('/excel', [procesos::class, 'export'])->name('excel');

Route::get('/editar_{id}', [procesos::class, 'editar'])->name('editar');

Route::put('/actualizar_{id}', [procesos::class, 'actualizar'])->name('actualizar');

Route::get('actividades', [procesos::class, 'actividades'])->name('actividades');

Route::post('verificarUsuario', [procesos::class, 'verificarUsuario'])->name('verificarUsuario');

Route::post('/carga_carnet', [procesos::class, 'carga_carnet'])->name('carga_carnet');

Route::get('/descargar_carnet_{id}_{tipo}', [procesos::class, 'descargar_carnet'])->name('descargar_carnet');



Route::get('/qr', [QrCodeController::class, 'showQrCode'])->name('qr');

Route::get('/trabajador_{trabajador}', [QrCodeController::class, 'trabajadores'])->name('trabajador');



Route::get('/guardar', [QrCodeController::class, 'guardar'])->name('guardar');

Route::get('/guardar_masivo', [QrCodeController::class, 'guardarmasivo'])->name('guardar_masivo');

Route::get('/generar_carnet_{cedula}', [QrCodeController::class, 'trabajadoresqr'])->name('generar_carnet');

