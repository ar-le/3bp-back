<?php

namespace Database\Seeders;

use App\Models\Clue;
use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CluesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transmission::factory()->count(5)->create();

        $info = [
            [
                'Meeting', 'Find **** at ******** when **t**j'
            ],
            [
                'City', '5FHG86J ---- YHGY'
            ],
            [
                'Arrival', '47h:23m:00s'
            ]
        ];

        foreach($info as $i)
        {
            Transmission::create([
                'title' => $i[0],
                'type' => 'text',
                'content' => $i[1]
            ]);
        }

        
    }
}
