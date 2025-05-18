<?php

namespace App\Http\Controllers;

use App\Models\Broadcast;
use App\Models\Category;
use App\Models\GiftDeposit;
use App\Models\Guest;
use App\Models\Setting;
use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function showDashboard()
    {
        $vip = Guest::join('categories', 'guests.category_id', '=', 'categories.id')
            ->where('categories.category_name', 'Tamu VIP')
            ->count();
        $totalTamuHadir = Guest::sum('guest_count');
        $totalSouvenir = Souvenir::count();
        $totalGiftDeposit = GiftDeposit::count();
        $totalTamuUndangan = Broadcast::count();
        $tamuHadir = Guest::where('is_invited', true)->count();
        $tamuTidakHadir = $totalTamuUndangan - $tamuHadir;
        return view('pages.dashboard', compact('vip', 'totalTamuHadir', 'totalSouvenir', 'totalGiftDeposit', 'tamuHadir', 'tamuTidakHadir'));
    }


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

    public function showCategories()
    {
        $categories = Category::all();
        return view('pages.event', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }
}
