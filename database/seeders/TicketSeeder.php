<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Priority;
use App\Models\SubCategory;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $requester = User::first();

        $department = Department::first();

        $category = Category::first();

        $subcategory = SubCategory::first();

        $priority = Priority::first();

        Ticket::create([

            'ticket_number'=>'HD-'.date('Ymd').'-000001',

            'subject'=>'Printer tidak dapat digunakan',

            'description'=>'Printer Epson L3210 mengalami paper jam dan tidak dapat mencetak dokumen.',

            'requester_id'=>$requester->id,

            'department_id'=>$department->id,

            'category_id'=>$category->id,

            'sub_category_id'=>$subcategory->id,

            'priority_id'=>$priority->id,

            'status'=>'NEW'

        ]);

    }
}