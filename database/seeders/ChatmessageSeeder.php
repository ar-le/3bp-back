<?php

namespace Database\Seeders;

use App\Models\Chatmessage;
use App\Models\ChatMessageInfo;
use App\Models\Chatroom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ChatmessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalmessages = 100;
        Chatmessage::factory()->count($totalmessages)->create();

        $chatrooms = Chatroom::all();
        $users = User::all();
        $messages = Chatmessage::all();

        //crear relación ternaria mensaje - autor - chatroom
        foreach ($messages as $index => $message) {
            ChatMessageInfo::create([
                        'chatmessage_id' => $message->id,
                        'user_id' => $users->random()->id,
                        'chatroom_id' => $chatrooms->random()->id
                    ]);
        }
    }
}
