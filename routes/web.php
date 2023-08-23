<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use \Illuminate\Support\Facades\Auth;

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
    // return "<b>Hello World!</b>";
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'get'])->name('profile.get');
    Route::post('/profile', [ProfileController::class, 'post'])->name('profile.post');

    Route::group([
        'middleware' => [],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        // admin
        // Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('book', 'App\Http\Controllers\Admin\BookController');
    });
});
