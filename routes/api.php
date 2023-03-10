<?php

use Illuminate\Http\Request;
use App\Hojaderuta;
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

Route::group(['prefix' => 'hojaderutas'], function () {
    Route::get('get/{id}', function ($id) {
        return Hojaderuta::find($id);
    });
});
