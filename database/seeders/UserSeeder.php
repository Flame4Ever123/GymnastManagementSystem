<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            array('name' => 'Super Admin', 'email' => 'superadmin@admin.com', 'password' => '12121212', 'roles' => 'super-admin'),
            array('name' => 'Admin', 'email' => 'admin@email.com', 'password' => '12121212', 'roles' => 'admin'),
        ];

        for ($i = 0; $i < count($users); $i++) {
            $data = User::create([
                'name' => $users[$i]['name'],
                'email' => $users[$i]['email'],
                'password' => bcrypt($users[$i]['password'])

            ]);
            $data->assignRole($users[$i]['roles']);
        }


        $superAdminAccess = [
            'read user-profile',
            'update user-profile',
            'delete user-profile',
            'create iam',
            'read iam',
            'update iam',
            'delete iam',
            'admin-dashboard',
        ];

        $adminAccess = [
            'read user-profile',
            'update user-profile',
            'delete user-profile',
            'read iam',
            'admin-dashboard',
        ];


        $role_super_admin = Role::findByName('super-admin');
        $role_admin = Role::findByName('admin');

        $role_admin->syncPermissions($adminAccess);
        $role_super_admin->syncPermissions($superAdminAccess);
    }
}
