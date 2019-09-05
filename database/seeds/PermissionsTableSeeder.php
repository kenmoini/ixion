<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    private $permissions = [
        'system.view-settings',
        'system.add-settings',
        'system.edit-settings',
        'system.save-settings',
        'system.delete-settings',

        'system.view-users',
        'system.add-users',
        'system.edit-users',
        'system.save-users',
        'system.delete-users',
        'system.view-login-attempts',
        'system.act-on-login-attempts',

        'system.view-roles',
        'system.add-roles',
        'system.edit-roles',
        'system.save-roles',
        'system.delete-roles',
        'system.attach-roles-to-user',
        'system.detach-roles-from-user',

        'system.view-permissions',
        'system.add-permissions',
        'system.edit-permissions',
        'system.save-permissions',
        'system.delete-permissions',
        'system.attach-permission-to-role',
        'system.detach-permission-from-role',

        'system.view-menus',
        'system.add-menus',
        'system.edit-menus',
        'system.save-menus',
        'system.delete-menus',

        'system.view-menu-items',
        'system.add-menu-items',
        'system.edit-menu-items',
        'system.save-menu-items',
        'system.delete-menu-items',
        'system.attach-menu-item-to-menu',
        'system.detach-menu-item-from-menu',

        'system.view-realms',
        'system.add-realms',
        'system.edit-realms',
        'system.save-realms',
        'system.delete-realms',
        'system.attach-user-to-realm',
        'system.attach-role-to-realm',
        'system.attach-menu-to-realm',
        'system.detach-user-from-realm',
        'system.detach-role-from-realm',
        'system.detach-menu-from-realm',
    ];

    /**
     * Return the default seeded permissions.
     *
     * @return array
     */
    public function fetchDefaultSeededPermissions()
    {
        return $this->permissions;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $permission) {
            DB::table('permissions')->insert([
                'slug' => $permission,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
