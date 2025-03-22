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
    }
}
