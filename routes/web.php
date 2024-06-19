<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(); 
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::get('/artwork', [App\Http\Controllers\ArtworkController::class, 'create'])->name('artwork');
Route::post('/artwork', [App\Http\Controllers\ArtworkController::class, 'store'])->name('artwork.store');
Route::post('/artwork/search', [App\Http\Controllers\ArtworkController::class, 'search'])->name('artwork.search');
Route::get('/artwork-add/{id}', [App\Http\Controllers\ArtworkController::class, 'add'])->name('artwork.add');
Route::get('/artwork-view/{id}', [App\Http\Controllers\ArtworkController::class, 'view'])->name('artwork.view');
Route::post('/dop/documentation', [App\Http\Controllers\DPOController::class, 'documentation'])->name('dpo.documentation');
Route::post('/dop/score', [App\Http\Controllers\DPOController::class, 'score'])->name('dpo.score');
Route::post('/dop/component', [App\Http\Controllers\DPOController::class, 'component'])->name('dpo.component');
Route::post('/dop/search', [App\Http\Controllers\DPOController::class, 'search'])->name('dpo.search');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
