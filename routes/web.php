<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Dashboard 
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/search', [App\Http\Controllers\DashboardController::class, 'search'])->name('search');
Route::get('/new_shared/{id}', [App\Http\Controllers\DashboardController::class, 'new_shared_link'])->name('new_shared');
Route::get('/new_link', [App\Http\Controllers\DashboardController::class, 'new_link'])->name('new_link');
Route::post('/postsharedlink1',[App\Http\Controllers\DashboardController::class, 'postSharedLink1'])->name('postsharedlink1');
Route::post('/postsharedlink2',[App\Http\Controllers\DashboardController::class, 'postSharedLink2'])->name('postsharedlink2');


//Notes
Route::get('/notes', [App\Http\Controllers\NotesController::class, 'index'])->name('notes');
Route::get('/edit/{id}', [App\Http\Controllers\NotesController::class, 'edit'])->name('edit');
Route::get('/new', [App\Http\Controllers\NotesController::class, 'new'])->name('new');
Route::post('/postnoteadd', [App\Http\Controllers\NotesController::class, 'postNoteCreate'])->name('postnoteadd');
Route::post('/postnoteupdate', [App\Http\Controllers\NotesController::class, 'postNoteEdit'])->name('postnoteupdate');




