<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\EleitoresController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\VotosController;

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

Route::get('/periodos', [PeriodoController::class, 'index']);
Route::get('/periodos/{id}/show', [PeriodoController::class, 'show'])->where('id','[0-9]+');
Route::get('/periodos/create', [PeriodoController::class, 'create']);
Route::post('/periodos/store', [PeriodoController::class, 'store']);
Route::get('/periodos/{id}/edit', [PeriodoController::class, 'edit']);
Route::post('/periodos/update', [PeriodoController::class, 'update']);
Route::get('/periodos/{id}/destroy', [PeriodoController::class, 'destroy']);

Route::get('/eleitores', [EleitoresController::class, 'index']);
Route::get('/eleitores/{id}/show', [EleitoresController::class, 'show'])->where('id','[0-9]+');
Route::get('/eleitores/create', [EleitoresController::class, 'create']);
Route::post('/eleitores/store', [EleitoresController::class, 'store']);
Route::get('/eleitores/{id}/edit', [EleitoresController::class, 'edit']);
Route::post('/eleitores/update', [EleitoresController::class, 'update']);
Route::get('/eleitores/{id}/destroy', [EleitoresController::class, 'destroy']);

Route::get('/candidatos', [CandidatosController::class, 'index']);
Route::get('/candidatos/{id}/show', [CandidatosController::class, 'show'])->where('id','[0-9]+');
Route::get('/candidatos/create', [CandidatosController::class, 'create']);
Route::post('/candidatos/store', [CandidatosController::class, 'store']);
Route::get('/candidatos/{id}/edit', [CandidatosController::class, 'edit']);
Route::post('/candidatos/update', [CandidatosController::class, 'update']);
Route::get('/candidatos/{id}/destroy', [CandidatosController::class, 'destroy']);
Route::get('/candidatos/{id}/destroy', [CandidatosController::class, 'destroy']);

Route::get('/votos', [VotosController::class, 'index']);

Route::view('/urna/', 'urna.index', ['title' => 'Bem-vindo!']);


Route::view('/inicio/', 'inicio.index', ['title' => 'Bem-vindo!']);
