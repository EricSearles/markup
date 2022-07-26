<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HorarioController;

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
Route::get('/sala-criar-horario/{sala}', [SalaController::class, 'createHorario'])->name('sala.criar.horario')->middleware('is_admin');
Route::post('/sala-cadastrar-horario', [SalaController::class, 'storeHorario'])->name('sala.cadastrar.horario')->middleware('is_admin');

Route::get('/horario', [HorarioController::class, 'index'])->name('horario')->middleware('is_admin');
Route::get('/horario-criar', [HorarioController::class, 'create'])->name('horario.criar')->middleware('is_admin');
Route::post('/horario-cadastrar', [HorarioController::class, 'store'])->name('horario.cadastrar')->middleware('is_admin');
Route::get('/horario-deletar/{id}', [HorarioController::class, 'destroy'])->name('horario.deletar')->middleware('is_admin');

Route::get('/agenda-criar/{sala}', [AgendaController::class, 'create'])->name('agenda.criar')->middleware('is_admin');
Route::post('/agenda-cadastrar', [AgendaController::class, 'store'])->name('agenda.cadastrar')->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/agenda', [HomeController::class, 'index'])->name('agenda');


Route::get('/funcionario-agenda', [HomeController::class, 'exibeAgendaFuncionario'])->name('agenda.funcionario');
Route::get('/agendar/{agenda_id}/{user_id}', [AgendaController::class, 'agendar'])->name('agendar');
Route::get('/cancelar/{agenda_id}/{user_id}', [AgendaController::class, 'cancelar'])->name('cancelar');
