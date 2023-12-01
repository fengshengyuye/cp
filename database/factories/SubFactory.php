<?php

namespace Database\Factories;

use App\Models\Cat;
use Illuminate\Database\Eloquent\Factories\Factory;


class SubFactory extends Factory
{
    public function definition()
    {
        return [
            'title'=>fake()->word(),
            'desc'=>fake()->paragraph(),
            'preview'=>url('fakes/images/clothes/'.mt_rand(1,13).'.png'),
            'cat_id'=>Cat::inRandomOrder()->first()->id
        ];
    }
}
