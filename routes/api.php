<?php

use App\Http\Controllers\API\v1\TagController;
use App\Http\Controllers\API\v1\PostController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1/tags', TagController::class);
Route::get('v1/tag/autocomplete', [TagController::class, 'autocomplete']);

Route::apiResource('v1/posts', PostController::class);
