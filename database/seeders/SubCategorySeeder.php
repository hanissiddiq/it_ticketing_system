<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            'Hardware'=>[
                ['LAPTOP','Laptop'],
                ['PC','Desktop PC'],
                ['MONITOR','Monitor'],
                ['KEYBOARD','Keyboard'],
                ['MOUSE','Mouse'],
            ],

            'Software'=>[
                ['WINDOWS','Windows'],
                ['OFFICE','Microsoft Office'],
                ['BROWSER','Browser'],
                ['PDF','PDF Reader'],
            ],

            'Network'=>[
                ['LAN','LAN'],
                ['WIFI','WiFi'],
                ['VPN','VPN'],
                ['INTERNET','Internet'],
            ],

            'Printer'=>[
                ['EPSON','Printer Epson'],
                ['CANON','Printer Canon'],
                ['HP','Printer HP'],
            ],

            'Email'=>[
                ['OUTLOOK','Outlook'],
                ['GMAIL','Gmail'],
                ['EXCHANGE','Exchange'],
            ]

        ];

        foreach($data as $categoryName=>$items){

            $category = Category::where('name',$categoryName)->first();

            if(!$category){
                continue;
            }

            foreach($items as $item){

                SubCategory::updateOrCreate(

                    [
                        'code'=>$item[0]
                    ],

                    [
                        'category_id'=>$category->id,
                        'name'=>$item[1],
                        'description'=>null,
                        'is_active'=>true
                    ]

                );

            }

        }
    }
}