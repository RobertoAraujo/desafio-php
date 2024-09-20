<?php

use App\Http\Controllers\Representantes\RepresentanteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clientes\ClienteController;
use App\Models\Representantes\Representante;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cliente')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cadastro', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::post('/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/deletar/{id}', [ClienteController::class, 'deletar'])->name('cliente.deletar');
});
Route::prefix('representante')->group(function () {
    Route::get('/', [RepresentanteController::class, 'index'])->name('representante.index');
    Route::get('/cadastro', [RepresentanteController::class, 'create'])->name('representante.create');
    Route::post('/store', [RepresentanteController::class, 'store'])->name('representante.store');
    Route::get('/edit/{id}', [RepresentanteController::class, 'edit'])->name('representante.edit');
    Route::post('/update/{id}', [RepresentanteController::class, 'update'])->name('representante.update');
    Route::delete('/deletar/{id}', [RepresentanteController::class, 'deletar'])->name('representante.deletar');
});
