<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecordController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('record', [RecordController::class, "store"])->name("record.store");
    // Route::match(['put', 'patch'], 'record/{record}', [RecordController::class, "update"])->name("record.update");
    // Route::delete('record/{record}', [RecordController::class, "destroy"])->name("record.destroy");

    Route::post('logout', [AuthController::class, "logout"])->name("user.logout");
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
