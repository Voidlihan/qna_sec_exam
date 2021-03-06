<?php

use App\Http\Controllers\FavoritesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ChannelsController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('threads/index', [ThreadsController::class, 'index']);
Route::get('threads/create', [ThreadsController::class, 'create'])->name('create');
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy'])->name('destroy');
Route::post('threads', [ThreadsController::class, 'store']);
Route::get('threads/{channel}', [ThreadsController::class, 'index'])->name('index');
Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy']);
Route::get('channels/create', [ChannelsController::class, 'create'])->name('channels.create');
Route::post('channels', [ChannelsController::class, 'store']);
Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);
Route::get('/profiles/{user}', [ProfilesController::class, 'show'])->name('profile');
