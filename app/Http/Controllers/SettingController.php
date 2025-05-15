<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSettings()
    {
        return view('pages.settings');
    }


    public function storeSettings(Request $request)
    {
        $fields = ['logo_dashboard', 'bg_gathering', 'bg_video_welcome'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('settings', 'public');
                Setting::set($field, 'storage/' . $path);
            }
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
