<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\RecuperacaoController;
use App\Http\Controllers\DefInventarioController;
use App\Http\Controllers\ArtigoController;

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

Route::get('/', function () {
    return view('landPage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/CreateInv', [Controller::class, 'createInv'])->name('createInv');

    Route::prefix('empresa')->group(function () {
        Route::get('/form', [EmpresaController::class, 'showForm'])->name('empresa.form');
        Route::post('/store', [EmpresaController::class, 'store'])->name('empresa.store');       
    });

    Route::get('/gestor', [GestorController::class, 'index'])->name('gestor');
    Route::put('/gestor/update/{gestor}', [GestorController::class, 'update'])->name('gestores.update');

    Route::get('/recuperacao', [RecuperacaoController::class, 'index'])->name('recuperacao');

    Route::get('/defenicoesInv', [DefInventarioController::class, 'index'])->name('DefInventario');

    Route::get('/adicionarArt', [ArtigoController::class, 'index'])->name('adicionarArt.index');
    Route::post('/adicionarArt', [ArtigoController::class, 'store'])->name('adicionarArt.store');
});


require __DIR__.'/auth.php';




