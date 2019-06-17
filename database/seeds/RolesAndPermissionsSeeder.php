<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'show']);
        Permission::create(['name' => 'print']);

        $role = Role::create(['name' => 'guest']);
        $role->givePermissionTo('show');

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('create','edit','show','update','print');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
