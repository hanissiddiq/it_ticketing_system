<?php

namespace Database\Factories;
use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketStatusFactory extends Factory
{
    public function definition(): array
    {
        return [

            'code'=>fake()->unique()->lexify('STATUS???'),

            'name'=>fake()->word(),

            'color'=>'#0d6efd',

            'sort_order'=>1,

            'is_default'=>false,

            'is_closed'=>false,

            'is_active'=>true

        ];
    }
}
