<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleCheck;
use App\Http\Middleware\TeamCheck;
use App\Models\Chatmessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//register checks
Route::get('availableUsername/{username}', [AuthController::class, 'availableUsername']);
Route::get('availableEmail/{email}', [AuthController::class, 'availableEmail']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function () {


    Route::get('logout', [AuthController::class, 'logout']);



    //chatrooms
    Route::get('chatrooms', [ChatroomController::class, 'index']);
    Route::get('chatrooms/teams', [ChatroomController::class, 'getTeamsChatroom']);
    Route::get('userchatrooms', [ChatroomController::class, 'getUserChatrooms']);
    Route::post('chatrooms/create', [ChatroomController::class, 'store']);
    Route::put('chatrooms', [ChatroomController::class, 'update']);
    Route::get('chatrooms/userteams', [ChatroomController::class, 'getUserTeamsChatrooms']);
    Route::get('chatroomInfo', [ChatroomController::class, 'show']);


    Route::get('users/profile', [UserController::class, 'getProfileInfo']);

    Route::middleware([RoleCheck::class . ':admin,mod'])->group(function () {
        Route::get('users/mod/characters', [UserController::class, 'getModCharacters']);
        Route::put('users/givePoints', [UserController::class, 'givePoints']);
        Route::get('chatmessages/reported', [ChatMessageController::class, 'getReported']);
        Route::put('chatmessages/hide', [ChatMessageController::class, 'hide']);
    });


    Route::middleware([RoleCheck::class . ':admin'])->group(function () {
        //chatrooms
        Route::get('chatrooms/teams', [ChatroomController::class, 'getTeamsChatroom']);
        Route::delete('chatrooms/{chatroomId}', [ChatroomController::class, 'destroy']);
        Route::delete('chatmessages', [ChatMessageController::class, 'destroy']);

        //user crud
        Route::post('users', [UserController::class, 'createUserAdmin']);
        Route::put('users', [UserController::class, 'updateUserAdmin']);
        Route::get('users', [UserController::class, 'getUsers']);
        Route::delete('users/{id}', [UserController::class, 'destroy']);
        Route::get('users/{id}', [UserController::class, 'get']);

        //teams
        Route::get('teams', [TeamsController::class, 'index']);
        Route::put('teams/recruiting', [TeamsController::class, 'updateRecruiting']);
        Route::get('teams/get', [TeamsController::class, 'show']);

        //transmissions
        Route::post('transmissions', [TransmissionController::class, 'store']);
        Route::put('transmissions', [TransmissionController::class, 'update']);
        Route::delete('transmissions/{id}', [TransmissionController::class, 'destroy']);
    });

    Route::get('chatmessages/report', [ChatMessageController::class, 'report']);
    Route::get('chatmessages/{id}', [ChatMessageController::class, 'show']);

    Route::middleware([TeamCheck::class])->group(function () {
        Route::get('chatmessages', [ChatMessageController::class, 'index']);
        Route::post('chatmessages/send', [ChatMessageController::class, 'store']);
    });



    //transmissions
//Route::apiResource('transmissions', TransmissionController::class);
    Route::get('transmissions', [TransmissionController::class, 'index']);
    Route::get('transmission/{id}', [TransmissionController::class, 'show']);


    //Teams
    Route::get('joinTeam', [TeamsController::class, 'joinTeam']);


});
