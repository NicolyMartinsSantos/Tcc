<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCliente;

Route::get('cadastrarCliente', [ControllerCliente::class, 'create']);
Route::post('cadastrarCliente', [ControllerCliente::class, 'store']);
Route::get('listarCliente', [ControllerCliente::class, 'index']);
Route::delete('deletarCliente/{id}', [ControllerCliente::class, 'destroy']);
Route::get('editarCliente/{id}', [ControllerCliente::class, 'edit']);
Route::put('atualizarCliente/{id}', [ControllerCliente::class,'update' ]);
