<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'System Admin',
                'description' => 'Global system administrator role with all permissions.',
                'permissions' => [
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
                    'system.detach-menu-from-realm'
                ]
            ],
            [
                'title' => 'System Moderator',
                'description' => 'Global system moderator role with permissions related to general operations.',
                'permissions' => [
                    'system.view-settings',
        
                    'system.view-users',
                    'system.view-login-attempts',
        
                    'system.view-roles',
        
                    'system.view-permissions',
        
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
                    'system.attach-menu-to-realm',
                    'system.detach-menu-from-realm'
                ]
            ],
            [
                'title' => 'System User',
                'description' => 'Global system user role with permissions related to general usage.',
                'permissions' => [
                    'system.view-settings',
                    'system.view-users',
                    'system.view-menus',
                    'system.view-menu-items',
                    'system.view-realms',
                ]
            ],
        ];

        foreach ($roles as $role) {
            $roleID = DB::table('roles')->insertGetId([
                'title' => $role['title'],
                'description' => $role['description'],
                'slug' => Str::slug($role['title']),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
            foreach ($role['permissions'] as $permission) {
                $permissionID = DB::table('permissions')->where('slug', $permission)->pluck('id');
                if ($permissionID) {
                    DB::table('permission_role')->insert([
                        'permission_id' => $permissionID[0], 
                        'role_id' => $roleID,
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]);
                }
            }
        }
    }
}
