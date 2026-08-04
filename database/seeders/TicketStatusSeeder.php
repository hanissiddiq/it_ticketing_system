<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [

            [
                'code'=>'NEW',
                'name'=>'New',
                'color'=>'#6f42c1',
                'sort_order'=>1,
                'is_default'=>true,
                'is_closed'=>false,
            ],

            [
                'code'=>'OPEN',
                'name'=>'Open',
                'color'=>'#0d6efd',
                'sort_order'=>2,
                'is_closed'=>false,
            ],

            [
                'code'=>'ASSIGNED',
                'name'=>'Assigned',
                'color'=>'#20c997',
                'sort_order'=>3,
                'is_closed'=>false,
            ],

            [
                'code'=>'IN_PROGRESS',
                'name'=>'In Progress',
                'color'=>'#fd7e14',
                'sort_order'=>4,
                'is_closed'=>false,
            ],

            [
                'code'=>'PENDING',
                'name'=>'Pending',
                'color'=>'#ffc107',
                'sort_order'=>5,
                'is_closed'=>false,
            ],

            [
                'code'=>'ESCALATED',
                'name'=>'Escalated',
                'color'=>'#dc3545',
                'sort_order'=>6,
                'is_closed'=>false,
            ],

            [
                'code'=>'RESOLVED',
                'name'=>'Resolved',
                'color'=>'#198754',
                'sort_order'=>7,
                'is_closed'=>false,
            ],

            [
                'code'=>'CLOSED',
                'name'=>'Closed',
                'color'=>'#212529',
                'sort_order'=>8,
                'is_closed'=>true,
            ],

            [
                'code'=>'CANCELLED',
                'name'=>'Cancelled',
                'color'=>'#6c757d',
                'sort_order'=>9,
                'is_closed'=>true,
            ],

        ];

        foreach($statuses as $status){

            TicketStatus::updateOrCreate(

                [
                    'code'=>$status['code']
                ],

                array_merge($status,[
                    'is_active'=>true
                ])

            );

        }
    }
}
