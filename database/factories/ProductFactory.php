<?php

namespace Database\Factories;

use App\Models\Sub;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'title'=>fake()->word(),
            'desc'=>fake()->paragraph(),
            'preview'=>url('fakes/images/clothes/'.mt_rand(1,13).'.png'),
            'video'=>url('fakes/videos/video.mp4'),
            'sub_id'=>Sub::inRandomOrder()->first()->id,
        ];
    }
}
