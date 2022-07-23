<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaController;

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
Route::get('/criar-sala', [SalaController::class, 'create'])->name('sala.criar')->middleware('is_admin');
Route::post('/cadastrar-sala', [SalaController::class, 'store'])->name('sala.cadastrar')->middleware('is_admin');
Route::get('/sala/{sala}/edit', [SalaController::class, 'edit'])->name('sala.edit')->middleware('is_admin');
Route::put('/sala-update', [SalaController::class, 'update'])->name('sala.update')->middleware('is_admin');
Route::get('/deletar-sala/{id}', [SalaController::class, 'destroy'])->name('sala.deletar')->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');

