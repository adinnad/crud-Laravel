<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublishController;

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

Route::get('/dashboard', [PublishController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('dashboard/create', [PublishController::class, 'create'])->middleware(['auth'])->name('create');

Route::get('dashboard/edit/{id}', [PublishController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::delete('/dashboard/{id}', [PublishController::class, 'destroy'])->middleware(['auth'])->name('publish.destroy');

require __DIR__.'/auth.php';

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/create', [PublishController::class, 'store'])->middleware(['auth'])->name('publish.store');

Route::put('/edit/{id}', [PublishController::class, 'update'])->middleware(['auth'])->name('publish.update');

Route::get('dashboard/noticia/{id}', [PublishController::class, 'show'])->middleware(['auth'])->name('publish.show');

Route::get('/', 'App\Http\Controllers\PublishController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

