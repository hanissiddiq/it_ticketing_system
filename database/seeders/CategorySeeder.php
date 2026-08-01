<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'code'=>'HW',
                'name'=>'Hardware'
            ],

            [
                'code'=>'SW',
                'name'=>'Software'
            ],

            [
                'code'=>'NET',
                'name'=>'Network'
            ],

            [
                'code'=>'PRN',
                'name'=>'Printer'
            ],

            [
                'code'=>'EMAIL',
                'name'=>'Email'
            ],

            [
                'code'=>'SERVER',
                'name'=>'Server'
            ],

            [
                'code'=>'SEC',
                'name'=>'Security'
            ],

            [
                'code'=>'OTHER',
                'name'=>'Other'
            ],

        ];

        foreach($categories as $item){

            Category::updateOrCreate(

                [

                    'code'=>$item['code']

                ],

                [

                    'name'=>$item['name'],

                    'icon'=>'fa-folder',

                    'color'=>'#0d6efd',

                    'description'=>null,

                    'is_active'=>true

                ]

            );

        }

    
    }
}
