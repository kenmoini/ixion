<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Permission;
use App\Role;
use App\SystemSetting;
use \MenuTableSeeder;
use \PermissionsTableSeeder;
use \RolesTableSeeder;
use \SystemSettingsSeeder;
use Schema;
use Illuminate\Http\Request;

class OOBESetupController extends Controller
{
    // checkOOBEStatus
    // Function that checks System Settings table and checks to see if the initial setup has been run
    public function checkOOBEStatus() {
        return SystemSetting::where('key', 'system_core.oobe-setup-run')->where('value', '1')->exists();
    }

    // redirectToInitialSetup
    // Returns the route named for the initial setup wizard
    public function redirectToInitialSetup() {
        return redirect()->route('system.get.oobe-setup');
    }
    
    public function showInitialSetupWizard() {
        $status_checks = $service_configuration = $system_configuration = [];

        //============================================================================================
        //Check to see if there's a mySQL DB Connection configured
        $service_configuration['default_database'] = config('database.default');
        $service_configuration['default_database_driver'] = config("database.connections.{$service_configuration['default_database']}.driver");
        $service_configuration['default_database_name'] = config("database.connections.{$service_configuration['default_database']}.database");

        //============================================================================================
        //Check for migrated tables required for core functionality
        $status_checks['migration_checks']['checkForSettingsTable'] = ['result' => Schema::hasTable('settings'), 'display_name' => 'Check for settings table'];
        $status_checks['migration_checks']['checkForPermissionsTable'] = ['result' => Schema::hasTable('permissions'), 'display_name' => 'Check for permissions table'];
        $status_checks['migration_checks']['checkForRolesTable'] = ['result' => Schema::hasTable('roles'), 'display_name' => 'Check for roles table'];
        $status_checks['migration_checks']['checkForUsersTable'] = ['result' => Schema::hasTable('users'), 'display_name' => 'Check for users table'];
        $status_checks['migration_checks']['checkForLoginAttemptsTable'] = ['result' => Schema::hasTable('login_attempts'), 'display_name' => 'Check for login_attempts table'];
        $status_checks['migration_checks']['checkForMenusTable'] = ['result' => Schema::hasTable('menus'), 'display_name' => 'Check for menus table'];
        $status_checks['migration_checks']['checkForMenuItemsTable'] = ['result' => Schema::hasTable('menu_items'), 'display_name' => 'Check for menu_items table'];
        $status_checks['migration_checks']['checkForRealmTable'] = ['result' => Schema::hasTable('realms'), 'display_name' => 'Check for realm table'];
        $status_checks['migration_checks']['checkForRealmablesTable'] = ['result' => Schema::hasTable('realmables'), 'display_name' => 'Check for realmables table'];
        $status_checks['migration_checks']['checkForRoleUserPivotTable'] = ['result' => Schema::hasTable('role_user'), 'display_name' => 'Check for role_user table'];
        $status_checks['migration_checks']['checkForPermissionRolePivotTable'] = ['result' => Schema::hasTable('permission_role'), 'display_name' => 'Check for permission_role table'];
        $status_checks['migration_checks']['checkForMenuMenuItemPivotTable'] = ['result' => Schema::hasTable('menu_menu_item'), 'display_name' => 'Check for menu_menu_item table'];

        //Loop through checks, add total check
        $passed = 1;
        foreach ($status_checks['migration_checks'] as $check) {
            if (!$check['result']) {
                $passed = 0;
            }
        }
        $status_checks['migration_checks_total'] = $passed;

        //============================================================================================
        //Check for default seeded Permissions
        $permissionsTableSeeder = new PermissionsTableSeeder;
        $checkedPermissions = [];
        $permissionSeederPassed = 1;
        foreach ($permissionsTableSeeder->fetchDefaultSeededPermissions() as $permission) {
            $checkedPermissions[$permission] = Permission::where('slug', $permission)->exists();
            if (!$checkedPermissions[$permission]) {
                $permissionSeederPassed = 0;
            }
        }
        $status_checks['permissions_default_seeder_checks'] = $checkedPermissions;
        $status_checks['permissions_default_seeder_checks_total'] = $permissionSeederPassed;

        //============================================================================================
        //Check for default seeded Roles
        $rolesTableSeeder = new RolesTableSeeder;
        $checkedRoles = [];
        $rolesSeederPassed = 1;
        foreach ($rolesTableSeeder->fetchDefaultSeededRoles() as $k => $role) {
            $checkedRoles[$role['title']] = Role::where('title', $role['title'])->exists();
            if (!$checkedRoles[$role['title']]) {
                $roleSeederPassed = 0;
            }
        }
        $status_checks['roles_default_seeder_checks'] = $checkedRoles;
        $status_checks['roles_default_seeder_checks_total'] = $rolesSeederPassed;

        //============================================================================================
        //Check for default seeded Settings
        $settingsTableSeeder = new SystemSettingsSeeder;
        $checkedSettings = [];
        $settingsSeederPassed = 1;
        foreach ($settingsTableSeeder->fetchDefaultSeededSettings() as $k => $setting) {
            $checkedSettings[$setting['display_name']] = SystemSetting::where('key', $setting['key'])->exists();
            if (!$checkedSettings[$setting['display_name']]) {
                $settingSeederPassed = 0;
            }
        }
        $status_checks['settings_default_seeder_checks'] = $checkedSettings;
        $status_checks['settings_default_seeder_checks_total'] = $settingsSeederPassed;

        //============================================================================================
        //Check for default seeded Menus
        $menusTableSeeder = new MenuTableSeeder;
        $checkedMenus = [];
        $menusSeederPassed = 1;
        foreach ($menusTableSeeder->fetchDefaultSeededMenus() as $k => $menu) {
            $checkedMenus[$menu['name']] = Menu::where(['name' => $menu['name'], 'menu_position' => $menu['menu_position']])->exists();
            if (!$checkedMenus[$menu['name']]) {
                $menuSeederPassed = 0;
            }
        }
        $status_checks['menus_default_seeder_checks'] = $checkedMenus;
        $status_checks['menus_default_seeder_checks_total'] = $menusSeederPassed;

        //TODO: Check for default seeded permission_role
        //TODO: Check for default seeded Menu Items...
        //TODO: Check for default seeded menu_menu_item
        //Check for .ixion-config file

        return view('system.oobe-setup.index')->with([
            'status_checks' => $status_checks,
            'service_configuration' => $service_configuration,
            'system_configuration' => $system_configuration
        ]);
    }

    public function processOOBEStatus() {
        if (!$this->checkOOBEStatus()) {
            return $this->redirectToInitialSetup();
        }
    }
}
