<?php

namespace Database\Factories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriorityFactory extends Factory
{
    public function definition(): array
    {
        return [

            'code'=>strtoupper(fake()->unique()->lexify('P?')),

            'name'=>fake()->randomElement([
                'Critical',
                'High',
                'Medium',
                'Low'
            ]),

            'color'=>'#0d6efd',

            'response_time'=>60,

            'resolution_time'=>480,

            'is_active'=>true

        ];
    }
}