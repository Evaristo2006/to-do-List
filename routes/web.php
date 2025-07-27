<?php

use App\Http\Controllers\TarefaController;
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

/*Route::get('', function () {
    return view('welcome');
});
*/


Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');

Route::put('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

// Corrigido: caminho separado para marcar como concluída
Route::put('/tarefas/{id}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');
