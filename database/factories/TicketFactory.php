<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Department;
use App\Models\Priority;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [

            'ticket_number'=>'HD-'.now()->format('Ymd').'-'.fake()->unique()->numerify('######'),

            'subject'=>fake()->sentence(),

            'description'=>fake()->paragraph(4),

            'requester_id'=>User::factory(),

            'assigned_to'=>null,

            'department_id'=>Department::factory(),

            'category_id'=>Category::factory(),

            'sub_category_id'=>SubCategory::factory(),

            'priority_id'=>Priority::factory(),

            'status'=>'NEW',

            'due_at'=>null,

            'resolved_at'=>null,

            'closed_at'=>null,

        ];
    }
}
