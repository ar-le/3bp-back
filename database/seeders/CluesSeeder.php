<?php

namespace Database\Seeders;

use App\Models\Clue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CluesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clue::factory()->count(5)->create();
    }
}
