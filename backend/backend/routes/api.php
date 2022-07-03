<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

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

Route::get('/listar',[TarefaController::class,'listar']);
Route::post('/adicionar',[TarefaController::class,'create']);
Route::get('/editar/{id}',[TarefaController::class,'edit']);
Route::put('/update',[TarefaController::class,'update']);
Route::delete('/delete/{id}',[TarefaController::class,'delete']);
