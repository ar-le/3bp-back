<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatroomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
//register checks
Route::get('availableUsername/{username}', [AuthController::class, 'availableUsername']);
Route::get('availableEmail/{email}', [AuthController::class, 'availableEmail']);


//chatrooms
Route::get('chatrooms', [ChatroomController::class, 'index']);
Route::get('chatrooms/teams', [ChatroomController::class, 'getTeamsChatroom']);
Route::get('userchatrooms/{userId}', [ChatroomController::class, 'getUserChatrooms']);
Route::post('chatrooms/create', [ChatroomController::class, 'store']);
Route::put('chatrooms/{chatroomId:int}', [ChatroomController::class, 'update']);
Route::delete('chatrooms/{chatroomId}', [ChatroomController::class, 'destroy']);
