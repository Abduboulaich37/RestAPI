<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Models\Students;

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


Route::post('/Students','App\Http\Controllers\ApiController@create');
Route::post('/Students','App\Http\Controllers\ApiController@check_email');
Route::get('/Students','App\Http\Controllers\ApiController@IdOrder');
Route::get('/Students/edit/{id}','App\Http\Controllers\ApiController@EditIdea');
Route::post('/Students/update/{id}','App\Http\Controllers\ApiController@UpdateIdea');
Route::get('/Students/Allideas','App\Http\Controllers\ApiController@AllIdeas');
Route::post('/Students/Acceptidea/{id}','App\Http\Controllers\ApiController@AcceptIdea');
Route::get('/Students/Acceptedideas','App\Http\Controllers\ApiController@AcceptedIdeas');
Route::get('/Students/Countacceptedideas','App\Http\Controllers\ApiController@CountAcceptedIdeas');
Route::post('/Students/Deleterefusedideas','App\Http\Controllers\ApiController@DeleteRefusedIdeas');








