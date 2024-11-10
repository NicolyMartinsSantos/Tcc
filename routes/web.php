<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCliente;

Route::get('cadastrarCliente', [ControllerCliente::class, 'create'])->name('cliente.create');
Route::post('cadastrarCliente', [ControllerCliente::class, 'store'])->name('cliente.store');
Route::get('listarCliente', [ControllerCliente::class, 'index'])->name('listarCliente');
Route::delete('deletarCliente/{id}', [ControllerCliente::class, 'destroy'])->name('cliente.destroy');
Route::get('editarCliente/{id}', [ControllerCliente::class, 'edit'])->name('cliente.edit');
Route::put('atualizarCliente/{id}', [ControllerCliente::class, 'update'])->name('cliente.update');
