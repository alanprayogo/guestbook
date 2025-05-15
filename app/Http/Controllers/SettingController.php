<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                $existingSetting = Setting::where('key', $field)->first();

                if ($existingSetting && $existingSetting->value && Storage::disk('public')->exists(str_replace('storage/', '', $existingSetting->value))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $existingSetting->value));
                }

                $path = $request->file($field)->store('settings', 'public');
                Setting::set($field, 'storage/' . $path);
            }
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
