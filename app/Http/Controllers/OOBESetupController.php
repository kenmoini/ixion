<?php

namespace App\Http\Controllers;

// Models
use App\SystemSetting;

// Libraries
use Illuminate\Http\Request;

class OOBESetupController extends Controller
{
    // checkOOBEStatus
    // Function that checks System Settings table and checks to see if the initial setup has been run
    public function checkOOBEStatus() {
        return SystemSetting::where('key', 'oobes_run')->where('value', '1')->exists();
    }

    // redirectToInitialSetup
    // Returns the route named for the initial setup wizard
    public function redirectToInitialSetup() {
        return route('system_core.get.oobe_setup');
    }
}
