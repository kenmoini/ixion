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
        ];
    }
}
