<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles =  [
            'super-admin',
            'admin',
        ];

        $permissions = [
            'read user-profile',
            'update user-profile',
            'delete user-profile',
            'create iam',
            'read iam',
            'update iam',
            'delete iam',
            'admin-dashboard',
            'user-dashboard',
        ];

        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }

        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
