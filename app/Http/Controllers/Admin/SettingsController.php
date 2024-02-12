<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all()->toArray();
        return view('admin.settings.index')->with('settings', $settings);
    }


    public function update(Request $request)
    {
        try {
            Settings::updateOrCreate(['option' => 'name'], ['value' => $request->input('website_title')]);
            Settings::updateOrCreate(['option' => 'copyright'], ['value' => $request->input('copyright')]);

            Settings::updateOrCreate(['option' => 'smtp-server'], ['value' => $request->input('smtp_server')]);
            Settings::updateOrCreate(['option' => 'smtp-port'], ['value' => $request->input('smtp_port')]);
            Settings::updateOrCreate(['option' => 'smtp-username'], ['value' => $request->input('smtp_username')]);
            Settings::updateOrCreate(['option' => 'smtp-password'], ['value' => $request->input('smtp_password')]);
            Settings::updateOrCreate(['option' => 'smtp-encryption'], ['value' => $request->input('smtp_encryption')]);
            Settings::updateOrCreate(['option' => 'sender-email'], ['value' => $request->input('sender_email')]);

            return redirect()->route('settings.index')
                ->with('success', 'Settings has been updated successfully');
        } catch (\Exception $e) {

            return redirect()->route('settings.index')
                ->with('error', 'Failed to update the settings. Please contact administrator');
        }
    }

    /**
     * Initialize the config
     *
     * @throws \Exception
     */
    public static function init(): void
    {
        # Just in case config('settings') doesn't exist
        if (is_array(config('settings'))) {
            # Create the default setting option if the key doesn't exist in database
            foreach (SettingsController::prefixKey('', config('settings')) as $_key => $_value) {
                Settings::firstOrCreate(['option' => $_key], ['value' => $_value]);
            }
            # Retrieve the settings from database
            $Settings = Settings::all()->pluck('value', 'option')->toArray();
            foreach ($Settings as $_option => $_value) {
                config(['settings.' . $_option => $_value]);
            }

            # Update the config helper to retrieve the database values
            # not the default values
            $config = array(
                'driver'     =>     'smtp',
                'host'       =>     $Settings['smtp-server'],
                'port'       =>     $Settings['smtp-port'],
                'username'   =>     $Settings['smtp-username'],
                'password'   =>     $Settings['smtp-password'],
                'encryption' =>     $Settings['smtp-encryption'],
                'from'       =>     array('address' => $Settings['sender-email'], 'name' =>  $Settings['name']),
            );
            Config::set('mail', $config);
        } else {
            throw new \Exception('The config `settings` does not exist.');
        }
    }

    public static function prefixKey($prefix, $array)
    {
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::prefixKey($prefix . $key . '.', $value));
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }
}
