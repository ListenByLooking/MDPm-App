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
Route::get('/user-add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
Route::post('/user-store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::post('/user-edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user-search', [App\Http\Controllers\UserController::class, 'search'])->name('user.search');
Route::post('/user-delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
Route::post('/user-update', [App\Http\Controllers\UserController::class, 'updates'])->name('user.update');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::get('/artwork', [App\Http\Controllers\ArtworkController::class, 'create'])->name('artwork');
Route::post('/artwork', [App\Http\Controllers\ArtworkController::class, 'store'])->name('artwork.store');
Route::post('/artwork/search', [App\Http\Controllers\ArtworkController::class, 'search'])->name('artwork.search');
Route::post('/artwork-delete', [App\Http\Controllers\ArtworkController::class, 'delete'])->name('artwork.delete');
Route::get('/artwork-view/{id}', [App\Http\Controllers\ArtworkController::class, 'view'])->name('artwork.view');
Route::get('/artwork-add/{id}/{dpo_id}/{new_id}', [App\Http\Controllers\ArtworkController::class, 'add'])->name('artwork.add');
Route::get('/artwork-pdf/{id}', [App\Http\Controllers\ArtworkController::class, 'pdf'])->name('artwork.pdf');
Route::post('/dpo/documentation', [App\Http\Controllers\DPOController::class, 'documentation'])->name('dpo.documentation');
 Route::post('/dpo/score', [App\Http\Controllers\DPOController::class, 'score'])->name('dpo.score');
Route::post('/dpo/insert', [App\Http\Controllers\DPOController::class, 'insertDPO'])->name('dpo.insert');
Route::post('/dpo/option', [App\Http\Controllers\DPOController::class, 'option'])->name('dpo.option');
Route::get('/dpo/listOption', [App\Http\Controllers\DPOController::class, 'listOption'])->name('dpo.listOption');
Route::post('/dpo/delete', [App\Http\Controllers\DPOController::class, 'delete'])->name('dpo.delete');
Route::post('/dpo/deleteDPO', [App\Http\Controllers\DPOController::class, 'deleteDPO'])->name('dpo.deleteDPO');
Route::post('/dpo/component', [App\Http\Controllers\DPOController::class, 'component'])->name('dpo.component');
Route::post('/dpo/search', [App\Http\Controllers\DPOController::class, 'search'])->name('dpo.search');
Route::post('/dpo/searchlist', [App\Http\Controllers\DPOController::class, 'searchlist'])->name('dpo.searchlist');
Route::get('/dpo/view/{id}', [App\Http\Controllers\DPOController::class, 'view'])->name('dpo.view');
Route::get('/dpo/pdf/{component_id}', [App\Http\Controllers\DPOController::class, 'pdf'])->name('dpo.pdf');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
