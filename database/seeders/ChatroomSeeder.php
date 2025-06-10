<?php

namespace Database\Seeders;

use App\Models\Chatroom;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //chats equipos
        Chatroom::create([
            'name' => 'Team Resistance',
            'description' => 'Fight togheter to protect the Earth',
            'creator_id' => User::where('username', '=', 'Luo Ji')->first()->id,
            'team_id' => Team::firstWhere('name' ,'=', 'Resistance')->id
        ]);

        Chatroom::create([
            'name' => 'Team Escapists',
            'description' => 'A future beyond this galaxy',
            'creator_id' => User::firstWhere('username', '=', 'Bill Hines')->id,
            'team_id' => Team::firstWhere('name' ,'=', 'Escapists')->id
        ]);


        Chatroom::create([
            'name' => 'Last transmission discussion',
            'description' => 'Share your thoughts about the last trisolaran communication',
            'creator_id' => User::firstWhere('username', '=', 'Ye Wenjie')->id,
            'team_id' => null
        ]);

        $info = [
            
            'Clue nº7 - ideas?',
            'Character discussion',
            'UFO sighting',
            'Breaking the cipher',
            'ETO\'s goals',
            'Trouble with rebels',
            'How long do we have?'
            
        ];
        foreach ($info as $title) {
            Chatroom::create(['name' => $title, 'description' => 'description',
            'creator_id' => 1,
            'team_id' => null]);
        }

        Chatroom::factory()->count(2)->create();

    }
}
