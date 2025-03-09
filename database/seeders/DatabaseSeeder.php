<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use App\Models\ChatMessageInfo;
use App\Models\Chatroom;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'TestUser',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => 'admin',
            'avatar' => null,

        ]);

        User::create([
            'username' => 'TestUser2',
            'email' => 'test2@example.com',
            'password' => 'password',
            'role' => 'user',
            'avatar' => null,

        ]);

        Chatroom::create([
            'name' => 'chat 1',
            'description' => 'some chat',
            'creator_id' => 1
        ]);
        Chatroom::create([
            'name' => 'chat 2',
            'description' => 'some chat',
            'creator_id' => 1
        ]);

        ChatMessage::create([
            'content' => 'hola',

        ]);
        ChatMessage::create([
            'content' => 'adios',

        ]);
        ChatMessageInfo::create([
            'user_id' => 1,
            'chatroom_id' => 1,
            'chatmessage_id' =>1
        ]);
        ChatMessageInfo::create([
            'user_id' => 1,
            'chatroom_id' => 1,
            'chatmessage_id' =>2
        ]);






    }
}
