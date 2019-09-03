<?php

use App\Http\Controllers\SystemHelpersController;
use Illuminate\Database\Seeder;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'default.locale',
                'value' => 'en-us',
                'display_name' => 'Default Locale & Language',
                'details' => 'System Default Locale & Language, also applied to newly created users if not specified.',
                'type' => 'dropdown-select',
                'parameters' => json_encode(['options' => ['en-us' => 'en-us']]),
                'order' => 0
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'default.timezone',
                'value' => 'America/Chicago',
                'display_name' => 'Default Timezone',
                'details' => 'Application-aware timezone, can be overriden by user set timezone.',
                'type' => 'dropdown-select',
                'parameters' => json_encode(['options' => SystemHelpersController::generate_timezone_list()]),
                'order' => 1
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'default.avatar',
                'value' => 'https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png',
                'display_name' => 'Default User Profile Avatar',
                'details' => '',
                'type' => 'input-url',
                'parameters' => '',
                'order' => 2
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'default.realm',
                'value' => '',
                'display_name' => 'System Default Realm',
                'details' => 'Default Realm associated with the core system.',
                'type' => 'function-call',
                'parameters' => json_encode(['presentation_format' => 'dropdown-select', 'function_call' => 'App\Http\Controllers\SystemHelpersController@generateDropdownSelectOfAvailableRealms']),
                'order' => 3
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'default.role',
                'value' => '',
                'display_name' => 'System Default Role',
                'details' => 'Default Role associated with new users.',
                'type' => 'function-call',
                'parameters' => json_encode(['presentation_format' => 'dropdown-select', 'function_call' => 'App\Http\Controllers\SystemHelpersController@generateDropdownSelectOfAvailableRoles']),
                'order' => 4
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'registration_type',
                'value' => '1',
                'display_name' => 'Registration',
                'details' => 'Registration options available to this system for new users.',
                'type' => 'dropdown-select',
                'parameters' => json_encode(['options' => ['0' => 'Registration disabled', '1' => 'Open registration publicly', '2' => 'Invite/Admin Creation Only', '3' => 'Domain Whitelist']]),
                'order' => 5
            ],
            [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'key' => 'registration_type.domain_whitelist',
                'value' => '',
                'display_name' => 'Registration - Domain Whitelist',
                'details' => 'If registration is enabled for whitelisted domains, you may enter one domain per line to enable a domain.  Wildcards not allowed.',
                'type' => 'textarea',
                'parameters' => '',
                'order' => 6
            ],
        ];
    }
}
