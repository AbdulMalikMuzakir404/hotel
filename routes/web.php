<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes();

Auth::routes(['verify'=>true]);

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'home'] , function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});
