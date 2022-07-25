<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\AgendaController;

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
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/sala', [SalaController::class, 'index'])->name('sala')->middleware('is_admin');
Route::get('/sala-criar', [SalaController::class, 'create'])->name('sala.criar')->middleware('is_admin');
Route::post('/sala-cadastrar', [SalaController::class, 'store'])->name('sala.cadastrar')->middleware('is_admin');
Route::get('/sala/{sala}/edit', [SalaController::class, 'edit'])->name('sala.edit')->middleware('is_admin');
Route::put('/sala-update', [SalaController::class, 'update'])->name('sala.update')->middleware('is_admin');
Route::get('/deletar-sala/{id}', [SalaController::class, 'destroy'])->name('sala.deletar')->middleware('is_admin');
Route::get('/sala/{sala}/show', [SalaController::class, 'show'])->name('sala.show')->middleware('is_admin');
Route::get('/sala-agenda', [SalaController::class, 'exibeAgenda'])->name('sala.agenda')->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/agenda', [HomeController::class, 'index'])->name('agenda');

Route::get('/funcionario-agenda', [HomeController::class, 'exibeAgendaFuncionario'])->name('agenda.funcionario');
Route::get('/agendar/{agenda_id}/{user_id}', [AgendaController::class, 'agendar'])->name('agendar');
Route::get('/cancelar/{agenda_id}/{user_id}', [AgendaController::class, 'cancelar'])->name('cancelar');
