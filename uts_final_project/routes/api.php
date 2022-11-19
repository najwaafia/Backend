<?php

use App\Http\Controllers\PatietnsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// List Route Patietns

//Get All Patietns
Route::get('/patients', [PatietnsController::class, 'index']);
//Get Patietns By ID
Route::get('/patients/{id}', [PatietnsController::class, 'show']);
//Create Patietns
Route::post('/patients', [PatietnsController::class, 'store']);
//Update Patietns
Route::put('/patients/{id}', [PatietnsController::class, 'update']);
//Delete Patietns
Route::delete('/patients/{id}', [PatietnsController::class, 'destroy']);
//Search Patietns
Route::get('/patients/search/{name}', [PatietnsController::class, 'search']);
//Get Patietns By Status
Route::get('/patients/status/{status}', [PatietnsController::class, 'status']);
