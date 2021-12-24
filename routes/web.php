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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });

    Route::get('admin', [\App\Http\Controllers\DataController::class, "index"])->name("admin.home");
    Route::get('admin/search/{range}', [\App\Http\Controllers\DataController::class, "show"])->name(
        "admin.home.search"
    );
    Route::get('admin/status', [\App\Http\Controllers\DataController::class, "status"])->name("admin.status");
    
    // Route::get('admin/refresh_avg', [\App\Http\Controllers\DataController::class, "refresh_avg"])->name("admin.refresh_avg");
});
