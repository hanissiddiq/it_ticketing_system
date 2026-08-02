<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run(): void
    {
        $priorities = [

            [
                'code'=>'P1',
                'name'=>'Critical',
                'color'=>'#dc3545',
                'response_time'=>15,
                'resolution_time'=>120
            ],

            [
                'code'=>'P2',
                'name'=>'High',
                'color'=>'#fd7e14',
                'response_time'=>30,
                'resolution_time'=>240
            ],

            [
                'code'=>'P3',
                'name'=>'Medium',
                'color'=>'#ffc107',
                'response_time'=>60,
                'resolution_time'=>480
            ],

            [
                'code'=>'P4',
                'name'=>'Low',
                'color'=>'#198754',
                'response_time'=>240,
                'resolution_time'=>1440
            ]

        ];

        foreach($priorities as $priority){

            Priority::updateOrCreate(

                [
                    'code'=>$priority['code']
                ],

                [
                    'name'=>$priority['name'],
                    'color'=>$priority['color'],
                    'response_time'=>$priority['response_time'],
                    'resolution_time'=>$priority['resolution_time'],
                    'is_active'=>true
                ]

            );

        }
    }
}