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
        return SystemSetting::where('key', 'system_core.oobe-setup-run')->where('value', '1')->exists();
    }

    // redirectToInitialSetup
    // Returns the route named for the initial setup wizard
    public function redirectToInitialSetup() {
        return redirect()->route('system.get.oobe-setup');
    }
    
    public function showInitialSetupWizard() {
        return view('system.oobe-setup.index');
    }

    public function processOOBEStatus() {
        if (!$this->checkOOBEStatus()) {
            return $this->redirectToInitialSetup();
        }
    }
}
