<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BeforeGameController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FillauthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminAuthController;

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
Route::post('/wrong_answer', [BeforeGameController::class, 'wrong_answer'])->name('wrong_answer');
Route::post('/question_list', [FunctionController::class, 'question_list']);
Route::get('/show_question_list', [FunctionController::class, 'show_question_list']);
Route::post('/ranking', [FunctionController::class, 'ranking']);
Route::get('/show_ranking', [FunctionController::class, 'show_ranking'])->name('show_ranking');
Route::get('/progress_reset', [FunctionController::class, 'progress_reset'])->name('progress_reset');
Route::get('/score_reset', [FunctionController::class, 'score_reset'])->name('score_reset');
Route::get('/miss_question', [FunctionController::class, 'miss_question']);
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/admin_select', [AdminController::class, 'admin_select'])->name('admin_select');
Route::post('/admin_select', [AdminController::class, 'admin_select'])->name('admin_select');
Route::post('/delete_ranking', [AdminController::class, 'delete_ranking'])->name('delete_ranking');
Route::get('/admin_menu', [AdminController::class, 'admin_menu'])->name('admin_menu');
Route::get('/redirect_ranking', [AdminController::class, 'redirect_ranking'])->name('redirect_ranking');
Route::post('/ranking_reset', [AdminController::class, 'ranking_reset'])->name('ranking_reset');
Route::get('/all_reset', [AdminController::class, 'all_reset'])->name('all_reset');
Route::get('/admin_newAdmin', [AdminController::class, 'admin_newAdmin']);
Route::get('/admin_passreset', [AdminController::class, 'admin_password']);
Route::post('/game_result', [FillauthController::class, 'game_result'])->name('game_result');
Route::post('/miss_result', [FillauthController::class, 'miss_result'])->name('miss_result');
Route::get('/game_result_show', [BeforeGameController::class, 'game_result_show'])->name('game_result_show');
Route::get('/miss_result_show', [BeforeGameController::class, 'miss_result_show'])->name('miss_result_show');
Route::get('/commentary', [BeforeGameController::class, 'commentary'])->name('commentary');
Route::get('/game_restart', [BeforeGameController::class, 'game_restart'])->name('game_restart');
Route::get('/back_commentary', [BeforeGameController::class, 'back_commentary'])->name('back_commentary');
Route::get('/question_commentary/{id}', [BeforeGameController::class, 'question_commentary'])->name('question_commentary');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('/admin_questionlist', [AdminController::class, 'admin_questionlist'])->name('admin.admin_questionlist');
Route::post('/admin_questionlist', [AdminController::class, 'admin_questionlist'])->name('admin.admin_questionlist');
Route::get('/select_reset', [AdminController::class, 'select_reset'])->name('select_reset');
Route::get('/admin_edit/{id}', [AdminController::class, 'admin_edit'])->name('admin.admin_edit');
Route::get('/admin_register', [AdminController::class, 'admin_register'])->name('admin.register');
Route::post('/admin_update/{id}', [AdminController::class, 'admin_update'])->name('admin.admin_update');
Auth::routes();
// routes/web.php
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');
Route::middleware('web')->group(function () {
    Auth::routes();  // この行は必ずwebミドルウェア内で定義
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['reset' => true]);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/password/change', [AdminAuthController::class, 'showPasswordChangeForm'])->name('admin.password.change');
Route::post('/admin/password/change', [AdminAuthController::class, 'changePassword']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
