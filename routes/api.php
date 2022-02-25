<?php

use App\Http\Controllers\LessonsController;
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
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::get('/Students', 'StudentsController@show');
    Route::get('/Students/{name}', 'StudentsController@detail');
    Route::post('/Students', 'StudentsController@store');
    Route::put('/Students/{id}', 'StudentsController@update');
    Route::delete('/Students/{id}', 'StudentsController@delete');

    Route::get('/Lessons', 'LessonsController@show');
    Route::get('/Lessons/{id}', 'LessonsController@detail');
    Route::post('/Lessons', 'LessonsController@store');

    Route::put('/Lessons/{id}', 'LessonsController@update');
    Route::delete('/Lessons/{id}', 'LessonsController@delete');
});
