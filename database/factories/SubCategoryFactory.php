<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [

            'category_id'=>Category::factory(),

            'code'=>strtoupper(fake()->unique()->lexify('SUB???')),

            'name'=>fake()->words(2,true),

            'description'=>fake()->sentence(),

            'is_active'=>true

        ];
    }
}