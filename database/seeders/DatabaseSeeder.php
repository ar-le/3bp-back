<?php

namespace Database\Seeders;

use App\Models\Chatmessage;
use App\Models\Chatmessage as ModelsChatmessage;
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


        $this->call([
            TeamSeeder::class,
            UsersSeeder::class,
            ChatroomSeeder::class,
            ChatmessageSeeder::class,
            CluesSeeder::class
        ]);

    }
}
