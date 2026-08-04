<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [

            'dashboard.view',

            'department.view',
            'department.create',
            'department.update',
            'department.delete',

            'category.view',
            'category.create',
            'category.update',
            'category.delete',

            'subcategory.view',
            'subcategory.create',
            'subcategory.update',
            'subcategory.delete',

            'priority.view',
            'priority.create',
            'priority.update',
            'priority.delete',

            'user.view',
            'user.create',
            'user.update',
            'user.delete',

            'ticket.view',
            'ticket.create',
            'ticket.update',
            'ticket.delete',
            'ticket.assign',
            'ticket.assignment',
            'ticket.comment',
            'ticket.close',
            'ticket.escalate',

            'report.view',
            'report.export',

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin'
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $helpdesk = Role::firstOrCreate([
            'name' => 'Helpdesk'
        ]);

        $support = Role::firstOrCreate([
            'name' => 'IT Support'
        ]);

        $supervisor = Role::firstOrCreate([
            'name' => 'Supervisor'
        ]);

        $manager = Role::firstOrCreate([
            'name' => 'Manager IT'
        ]);

        $user = Role::firstOrCreate([
            'name' => 'User'
        ]);

        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'dashboard.view',

            'department.view',
            'department.create',
            'department.update',

            'category.view',
            'category.create',
            'category.update',

            'subcategory.view',
            'subcategory.create',
            'subcategory.update',

            'priority.view',
            'priority.create',
            'priority.update',

            'user.view',
            'user.create',
            'user.update',

            'ticket.assignment',
        ]);

        $helpdesk->givePermissionTo([
            'dashboard.view',
            'ticket.view',
            'ticket.create',
            'ticket.update',
            'ticket.assign',
            'ticket.comment',
            'ticket.escalate',

            'ticket.assignment',
        ]);

        $support->givePermissionTo([
            'dashboard.view',
            'ticket.view',
            'ticket.update',
            'ticket.comment',
            'ticket.close',
        ]);

        $supervisor->givePermissionTo([
            'dashboard.view',
            'report.view',
        ]);

        $manager->givePermissionTo([
            'dashboard.view',
            'report.view',
            'ticket.view',
        ]);

        $user->givePermissionTo([
            'ticket.create',
            'ticket.view',
            'ticket.comment',
        ]);
    }
}
