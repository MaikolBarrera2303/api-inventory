<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TypeDeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware("bearerToken")->group(function (){

    Route::apiResource("devices",DeviceController::class);

    Route::apiResource("type-devices",TypeDeviceController::class);


});
