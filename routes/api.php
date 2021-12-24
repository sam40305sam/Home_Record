<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [AuthController::class, "login"])->name("user.login");
//Route::post('register', [AuthController::class,"register"])->name("user.register");


Route::get('record', [RecordController::class, "index"])->name("record.index");
Route::get('record/{record}', [RecordController::class, "show"])->name("record.show");

//Route::apiResource('record', RecordController::class);
Route::post('record/search/{range}', [RecordController::class,"search"])->name("record.search");
Route::post('record/refresh/{range}', [RecordController::class,"refresh"])->name("record.refresh");

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('record', [RecordController::class, "store"])->name("record.store");
    Route::match(['put', 'patch'], 'record/{record}', [RecordController::class, "update"])->name("record.update");
    Route::delete('record/{record}', [RecordController::class, "destroy"])->name("record.destroy");

    Route::post('logout', [AuthController::class, "logout"])->name("user.logout");
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
