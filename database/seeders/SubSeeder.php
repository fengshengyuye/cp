<?php

namespace Database\Seeders;

use App\Models\Sub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSeeder extends Seeder
{
    public function run()
    {
        Sub::factory(60)->create();
    }
}
