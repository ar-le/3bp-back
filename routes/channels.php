<?php

use App\Models\Chatroom;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
},['guards' => ['sanctum']]);

Broadcast::channel('private-channel.user.{id}', function($user, $id){
    return $user->id == $id;
},['guards' => ['sanctum']]);

Broadcast::channel('transmissions-channel', function (){
    return true;
},['guards' => ['sanctum']]);

Broadcast::channel('chatroom-{id}', function($user, $id){
    //comprobar si el ususario puede usar la sala
    $chatroomTeam = Chatroom::find($id)->team;
    //si la sala no tiene equipo puede acceder cualquier usuario registrado
    if(!$chatroomTeam) return true;
    //si tiene equipo comprobar si el usuario pertenece a ese equipo
    if($user->team_id == $chatroomTeam->id) return true;
    return false;
},['guards' => ['sanctum']]);


//"chatroom-$this->chatroomId"
