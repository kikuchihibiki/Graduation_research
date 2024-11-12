<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BeforeGameController;
use App\Http\Controllers\FunctionController;

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

Route::get('/', [BeforeGameController::class, 'title_display']);
Route::post('/input_setup', [BeforeGameController::class, 'save_name'])->name('save_name');
Route::get('/select_mode', [BeforeGameController::class, 'select_mode'])->name('select_mode');
Route::post('/select_level', [BeforeGameController::class, 'save_mode'])->name('save_mode');
Route::post('/start_game', [BeforeGameController::class, 'start_game'])->name('start_game');
Route::get('/question_list', [FunctionController::class, 'question_list']);
Route::get('/ranking', [FunctionController::class, 'ranking']);
