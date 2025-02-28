<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\procesos;

/*Route::get('/', function () {
    return view('index');
});*/



Route::get('/', [procesos::class, 'index'])->name('index');

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