<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $departments = [
            ['code'=>'IT','name'=>'Information Technology'],
            ['code'=>'HRD','name'=>'Human Resource Development'],
            ['code'=>'FIN','name'=>'Finance'],
            ['code'=>'ACC','name'=>'Accounting'],
            ['code'=>'MKT','name'=>'Marketing'],
            ['code'=>'OPS','name'=>'Operational'],
            ['code'=>'LOG','name'=>'Logistic'],
            ['code'=>'WH','name'=>'Warehouse'],
            ['code'=>'GA','name'=>'General Affairs'],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['code' => $department['code']],
                [
                    'name' => $department['name'],
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
