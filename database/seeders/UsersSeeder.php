<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'role' => 'admin',
            'avatar' => null

        ]);

        $mod1 = User::create([
            'username' => 'mod1',
            'email' => 'mod1@mod.com',
            'password' => 'password',
            'role' => 'mod',
            'avatar' => null,
            'team_id' => 1
        ]);

        $mod2 = User::create([
            'username' => 'mod2',
            'email' => 'mod2@mod.com',
            'password' => 'password',
            'role' => 'mod',
            'avatar' => null,
            'team_id' => 2
        ]);

        $teams = Team::all();
        foreach ($teams as $team) {
            User::factory()->count(10)->for($team);
        }


        //personajes
        $personajes = ['Wang Miao', 'Ye Wenjie', 'Luo Ji', 'Manuel Rey Díaz', 'Bill Hines', 'Cheng Xin'];
        foreach ($personajes as $i=>$personaje) {
            $char = User::factory()->create([
                'username' => $personaje,
                'email' => null,
                'role' => 'character',
                'avatar' => null,
            ]);

            //asignar personaje a mods
            //tabla relación entre mods y personajes que pueden usar
            DB::table('can_use_character')->insert([
                'mod_id' => $i%2 == 0 ? $mod1->id : $mod2->id,
                'character_id' => $char->id
            ]);

        }


        //usuarios normales
        User::factory()->count(10)->state(new Sequence(
            fn (Sequence $sequence) => ['team_id' => $teams->random()]
        ))->create();


    }
}
