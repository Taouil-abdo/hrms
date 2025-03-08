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
        $adminRole = Role::create(['name' => 'admin']);
        $RHmanagerRole = Role::create(['name' => 'RHmanager']);
        $managerRole = Role::create(['name' => 'manager']);
        $employee = Role::create(['name' => 'employee']);


        $viewUsersPermission = Permission::create(['name' => 'add users']);
        $updateUsersPermission = Permission::create(['name' => 'update users']);
        $viewProfilePermission = Permission::create(['name' => 'view profile ']);
        $addformationPermission = Permission::create(['name' => 'add formation']);
        $updateformationPermission = Permission::create(['name' => 'update formation']);
        $viewformationPermission = Permission::create(['name' => 'view formation']);
        $addjobPermission = Permission::create(['name' => 'add job']);
        $updatejobPermission = Permission::create(['name' => 'update job']);
        $viewjobPermission = Permission::create(['name' => 'view job']);
        $adddepartementPermission = Permission::create(['name' => 'add departement']);
        $updatedepartementPermission = Permission::create(['name' => 'update departement']);
        $viewdepartementPermission = Permission::create(['name' => 'view departement']);
        


        $adminRole->givePermissionTo($viewUsersPermission, $updateUsersPermission,$viewdepartementPermission,$updatedepartementPermission,$adddepartementPermission,$viewjobPermission,$updatejobPermission,$addjobPermission,$viewformationPermission,$updateformationPermission,$addformationPermission,$viewProfilePermission,$updateUsersPermission,$addUsersPermission);
        $RHmanagerRole->givePermissionTo($viewUsersPermission,$viewUsersPermission,$viewdepartementPermission,$updatedepartementPermission,$adddepartementPermission,$viewjobPermission,$updatejobPermission,$addjobPermission,$viewformationPermission,$updateformationPermission,$addformationPermission,$viewProfilePermission,$updateUsersPermission,$addUsersPermission);
        $managerRole->givePermissionTo($viewProfilePermission,$viewdepartementPermission,$updatedepartementPermission,$adddepartementPermission,$viewjobPermission,$updatejobPermission,$addjobPermission,$viewformationPermission,$updateformationPermission,$addformationPermission,$viewProfilePermission,$updateUsersPermission,$addUsersPermission);
        $userRole->givePermissionTo($viewProfilePermission);

        $user = User::find(1); 
        $user->assignRole('admin');
    }


}
