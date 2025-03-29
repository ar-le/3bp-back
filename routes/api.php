<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\TransmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//register checks
Route::get('availableUsername/{username}', [AuthController::class, 'availableUsername']);
Route::get('availableEmail/{email}', [AuthController::class, 'availableEmail']);

Route::middleware(['auth:sanctum'])->group(function () {


Route::get('logout', [AuthController::class, 'logout']);



//chatrooms
Route::get('chatrooms', [ChatroomController::class, 'index']);
Route::get('chatrooms/teams', [ChatroomController::class, 'getTeamsChatroom']);
Route::get('userchatrooms', [ChatroomController::class, 'getUserChatrooms']);
Route::post('chatrooms/create', [ChatroomController::class, 'store']);
Route::put('chatrooms', [ChatroomController::class, 'update']);
Route::delete('chatrooms/{chatroomId}', [ChatroomController::class, 'destroy']);
Route::get('chatrooms/userteams', [ChatroomController::class, 'getUserTeamsChatrooms']);


//transmissions
//Route::apiResource('transmissions', TransmissionController::class);
Route::get('transmissions', [TransmissionController::class, 'index']);
Route::get('transmission/{id}', [TransmissionController::class, 'show']);
Route::post('transmissions', [TransmissionController::class, 'store']);
Route::put('transmissions', [TransmissionController::class, 'update']);
Route::delete('transmissions/{id}', [TransmissionController::class, 'destroy']);

});
