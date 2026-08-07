<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $it = Department::where('code','IT')->first();

        // 1. Super Admin
        $superAdmin = User::updateOrCreate(

            [

                'email'=>'superadmin@gmail.com'

            ],

            [

                'employee_id'=>'EMP0001',

                'name'=>'Super Administrator',

                'password'=>bcrypt('password'),

                'department_id'=>$it?->id,

                'position'=>'IT Manager',

                'phone'=>'08123456789',

                'is_active'=>true

            ]

        );

        $superAdmin->assignRole('Super Admin');
		
		// 2. Admin
        $admin = User::updateOrCreate(
            [
                'email'=>'admin@gmail.com'
            ],
            [
                'employee_id'=>'EMP0002',
                'name'=>'Administrator',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'Admin Staff',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $admin->assignRole('Admin');

        // 3. Helpdesk
        $helpdesk = User::updateOrCreate(
            [
                'email'=>'helpdesk@gmail.com'
            ],
            [
                'employee_id'=>'EMP0003',
                'name'=>'Helpdesk Agent',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'Helpdesk Officer',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $helpdesk->assignRole('Helpdesk');

        // 4. IT Support
        $itSupport = User::updateOrCreate(
            [
                'email'=>'itsupport@gmail.com'
            ],
            [
                'employee_id'=>'EMP0004',
                'name'=>'IT Support Technical',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'IT Support Specialist',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $itSupport->assignRole('IT Support');

        // 5. Supervisor
        $supervisor = User::updateOrCreate(
            [
                'email'=>'supervisor@gmail.com'
            ],
            [
                'employee_id'=>'EMP0005',
                'name'=>'IT Supervisor',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'IT Supervisor',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $supervisor->assignRole('Supervisor');

        // 6. Manager IT
        $managerIT = User::updateOrCreate(
            [
                'email'=>'manager.it@gmail.com'
            ],
            [
                'employee_id'=>'EMP0006',
                'name'=>'Manager IT',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'IT Manager',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $managerIT->assignRole('Manager IT');

        // 7. User
        $user = User::updateOrCreate(
            [
                'email'=>'user@gmail.com'
            ],
            [
                'employee_id'=>'EMP0007',
                'name'=>'Regular User',
                'password'=>bcrypt('password'),
                'department_id'=>$it?->id,
                'position'=>'Staff',
                'phone'=>'08123456789',
                'is_active'=>true
            ]
        );
        $user->assignRole('User');
    

    }
}
