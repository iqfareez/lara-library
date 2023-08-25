<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransactionController as UserTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
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
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/profile', [ProfileController::class, 'get'])->name('profile.get');
    Route::post('/profile', [ProfileController::class, 'post'])->name('profile.post');
    Route::get('/transaction', [UserTransactionController::class, 'index'])->name('transaction.index');

    Route::group([
        'middleware' => ['admin'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        // admin
        // Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.get');
        Route::resource('user', 'App\Http\Controllers\Admin\UserController');
        Route::get('/book/export', [BookController::class, 'exportExcel'])->name('book.export');
        Route::resource('book', 'App\Http\Controllers\Admin\BookController');
        Route::get('/transaction/pdf', [TransactionController::class, 'exportPdf'])->name('transaction.pdf');
        Route::resource('{book}/transaction', 'App\Http\Controllers\Admin\TransactionController');
    });
});
