<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions;

        Permission::create(['name' => 'view books']);
        Permission::create(['name' => 'create books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'delete books']);
        Permission::create(['name' => 'publish books']);
        Permission::create(['name' => 'unpublish books']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionsTo('view books');
        $userRole->givePermissionsTo('create books');
        $userRole->givePermissionsTo('edit books');
        $userRole->givePermissionsTo('delete books');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionsTo('view books');
        $adminRole->givePermissionsTo('create books');
        $adminRole->givePermissionsTo('edit books');
        $adminRole->givePermissionsTo('delete books');
        $adminRole->givePermissionsTo('publish books');
        $adminRole->givePermissionsTo('unpublish books');

        $superadminRole = Role::create(['name' => 'super-admin']);
    }
}
