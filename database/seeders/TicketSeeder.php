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
    // public function run(): void
    // {
    //     $requester = User::first();

    //     $department = Department::first();

    //     $category = Category::first();

    //     $subcategory = SubCategory::first();

    //     $priority = Priority::first();

    //     Ticket::create([

    //         'ticket_number'=>'HD-'.date('Ymd').'-000001',

    //         'subject'=>'Printer tidak dapat digunakan',

    //         'description'=>'Printer Epson L3210 mengalami paper jam dan tidak dapat mencetak dokumen.',

    //         'requester_id'=>$requester->id,

    //         'department_id'=>$department->id,

    //         'category_id'=>$category->id,

    //         'sub_category_id'=>$subcategory->id,

    //         'priority_id'=>$priority->id,

    //         'status'=>'NEW'

    //     ]);

    // }

    /*
    |--------------------------------------------------------------------------
    | Seeder 3 jenis ticket untuk testing
    |--------------------------------------------------------------------------
    */
     public function run(): void
    {
        $requester = User::first();
        $department = Department::first();

        $categories = Category::take(3)->get();
        $subCategories = SubCategory::take(3)->get();
        $priorities = Priority::take(3)->get();

        if (
            !$requester ||
            !$department ||
            $categories->isEmpty() ||
            $subCategories->isEmpty() ||
            $priorities->isEmpty()
        ) {
            $this->command->error('Pastikan data master (User, Department, Category, SubCategory, Priority) sudah tersedia.');
            return;
        }

        $tickets = [
            [
                'ticket_number'   => 'HD-' . date('Ymd') . '-000001',
                'subject'         => 'Printer tidak dapat digunakan',
                'description'     => 'Printer Epson L3210 mengalami paper jam sehingga tidak dapat mencetak dokumen.',
                'category_id'     => $categories[0]->id,
                'sub_category_id' => $subCategories[0]->id,
                'priority_id'     => $priorities[0]->id,
                'status'          => 'NEW',
            ],
            [
                'ticket_number'   => 'HD-' . date('Ymd') . '-000002',
                'subject'         => 'Komputer sering restart sendiri',
                'description'     => 'PC pada bagian keuangan sering restart secara tiba-tiba ketika menjalankan aplikasi.',
                'category_id'     => $categories->count() > 1 ? $categories[1]->id : $categories[0]->id,
                'sub_category_id' => $subCategories->count() > 1 ? $subCategories[1]->id : $subCategories[0]->id,
                'priority_id'     => $priorities->count() > 1 ? $priorities[1]->id : $priorities[0]->id,
                'status'          => 'OPEN',
            ],
            [
                'ticket_number'   => 'HD-' . date('Ymd') . '-000003',
                'subject'         => 'Email perusahaan tidak dapat diakses',
                'description'     => 'Pengguna tidak dapat login ke email perusahaan sejak pagi hari dan muncul pesan autentikasi gagal.',
                'category_id'     => $categories->count() > 2 ? $categories[2]->id : $categories[0]->id,
                'sub_category_id' => $subCategories->count() > 2 ? $subCategories[2]->id : $subCategories[0]->id,
                'priority_id'     => $priorities->count() > 2 ? $priorities[2]->id : $priorities[0]->id,
                'status'          => 'IN_PROGRESS',
            ],
        ];

        foreach ($tickets as $ticket) {
            Ticket::create([
                'ticket_number'   => $ticket['ticket_number'],
                'subject'         => $ticket['subject'],
                'description'     => $ticket['description'],
                'requester_id'    => $requester->id,
                'department_id'   => $department->id,
                'category_id'     => $ticket['category_id'],
                'sub_category_id' => $ticket['sub_category_id'],
                'priority_id'     => $ticket['priority_id'],
                'status'          => $ticket['status'],
            ]);
        }
    }
}