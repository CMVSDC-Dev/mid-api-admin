<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function updateEnv(Request $request) {
        $key = $request->key;
        $value = $request->value;
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '="' . env($key) . '"',
                $key . '="' . $value . '"',
                file_get_contents($path)
            ));
        }
    }
}
