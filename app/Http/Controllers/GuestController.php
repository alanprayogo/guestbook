<?php

namespace App\Http\Controllers;

use App\Models\Broadcast;
use App\Models\Category;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function showGuest()
    {
        $category = Category::all();
        $listGuest = Broadcast::with(['category'])
            ->orderBy('created_at', 'asc')
            ->get();
        return view('pages.manage-guest', compact('category', 'listGuest'));
    }


    private function normalizePhoneNumber($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (str_starts_with($phone, '62')) {
            return $phone;
        }
        if (str_starts_with($phone, '0')) {
            return '62' . substr($phone, 1);
        }
        return $phone;
    }

    public function storeGuest(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_id'    => 'required|exists:categories,id',
                'guest_name'     => 'required|string',
                'session'        => 'required|in:Sesi 1,Sesi 2,Sesi 3,Sesi 4,Sesi 5',
                'url'           => 'required|in:byattari,attarivation',
                'no_table'       => 'required|in:Meja 1,Meja 2,Meja 3,Meja 4,Meja 5',
                'guest_limit'    => 'required|in:1 Orang,2 Orang,3 Orang,4 Orang,5 Orang,6 Orang',
                'kata_pengantar' => 'required|string',
            ], [
                'category_id.required'    => 'Kategori harus dipilih.',
                'category_id.exists'      => 'Kategori yang dipilih tidak valid.',
                'guest_name.required'     => 'Nama tamu harus diisi.',
                'guest_name.string'       => 'Nama tamu harus berupa teks.',
                'url.required'            => 'URL harus dipilih.',
                'url.in'                  => 'URL yang dipilih tidak valid.',
                'no_table.required'       => 'Meja harus dipilih.',
                'no_table.in'             => 'Meja yang dipilih tidak valid.',
                'session.required'        => 'Sesi harus dipilih.',
                'session.in'              => 'Sesi yang dipilih tidak valid.',
                'guest_limit.required'    => 'Batas tamu harus dipilih.',
                'guest_limit.in'          => 'Batas tamu yang dipilih tidak valid.',
                'kata_pengantar.required' => 'Kata pengantar harus diisi.',
                'kata_pengantar.string'   => 'Kata pengantar harus berupa teks.',
            ]);

            $lines = preg_split('/\r\n|\r|\n/', $validated['guest_name']);

            foreach ($lines as $index => $line) {
                $line = trim($line);
                if ($line === '') continue;

                if (strpos($line, '-') === false) {
                    Log::warning("Baris tamu ke-" . ($index + 1) . " tidak valid: '$line'");
                    continue;
                }

                [$name, $phone] = array_map('trim', explode('-', $line, 2));
                $phone = $this->normalizePhoneNumber($phone);

                if ($name && $phone) {
                    Broadcast::create([
                        'category_id'   => $validated['category_id'],
                        'guest_name'   => $name,
                        'guest_phone'  => $phone,
                        'url'          => $validated['url'],
                        'no_table'     => $validated['no_table'],
                        'session'      => $validated['session'],
                        'guest_limit'  => $validated['guest_limit'],
                        'kata_pengantar' => $validated['kata_pengantar'],
                    ]);
                } else {
                    Log::warning("Data kosong di baris ke-" . ($index + 1) . ": '$line'");
                }
            }

            Log::info('Broadcast dan tamu berhasil disimpan', [
                'total_tamu'   => count($lines),
            ]);

            return redirect()->back()->with('success', 'Data tamu berhasil disimpan!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            $errors = $exception->errors();
            $errorMessages = [];
            foreach ($errors as  $error) {
                $errorMessages[] = $error[0];
            }

            Log::error('Error saat menyimpan data tamu', [
                'errors'  => $errorMessages,
                'request' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data tamu.')->withErrors($errors);
        } catch (\Throwable $th) {
            Log::error('Error saat menyimpan data tamu', [
                'error'   => $th->getMessage(),
                'request' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data tamu.');
        }
    }

    public function updateGuest(Request $request)
    {
        try {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'guest_phone' => 'required|string|max:20',
                'category_id' => 'required|exists:categories,id',
                'url' => 'required|in:byattari,attarivation',
                'no_table' => 'required|in:Meja 1,Meja 2,Meja 3,Meja 4,Meja 5',
                'session' => 'required|in:Sesi 1,Sesi 2,Sesi 3,Sesi 4,Sesi 5',
                'guest_limit' => 'required|in:1 Orang,2 Orang,3 Orang,4 Orang,5 Orang,6 Orang',
            ]);

            $guest = Broadcast::findOrFail($request->id);
            $guest->category_id = $request->category_id;
            $guest->guest_name = $request->guest_name;
            $guest->guest_phone = $this->normalizePhoneNumber($request->guest_phone);
            $guest->url = $request->url;
            $guest->no_table = $request->no_table;
            $guest->session = $request->session;
            $guest->guest_limit = $request->guest_limit;
            $guest->save();

            return redirect()->back()->with('success', 'Data tamu berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Guest not found during update: ' . $e->getMessage(), ['id' => $request->id]);
            return redirect()->back()->with('error', 'Data tamu tidak ditemukan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed during guest update', [
                'errors' => $e->errors(),
                'input' => $request->all(),
            ]);
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Unexpected error during guest update: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deleteGuest($id)
    {
        $guest = Broadcast::findOrFail($id);
        $guest->delete();

        return redirect()->back()->with('success', 'Data tamu berhasil dihapus.');
    }

    public function showGuestArrive()
    {
        $category = Category::all();
        $guest = Guest::all();
        return view('pages.guest-arrival', compact('category', 'guest'));
    }

    public function getGuestCategory(Request $request)
    {
        $guestName = $request->query('guest_name');

        $guestBroadcast = Broadcast::where('guest_name', $guestName)->first();
        $alreadyExists = Guest::where('guest_name', $guestName)->exists();

        if (!$guestBroadcast) {
            return response()->json([
                'guest' => null,
                'already_exists' => $alreadyExists,
                'not_in_list' => true
            ]);
        }

        return response()->json([
            'guest' => $guestBroadcast->broadcast->category,
            'already_exists' => $alreadyExists,
            'not_in_list' => false
        ]);
    }



    public function storeGuestArrive(Request $request)
    {
        try {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'guest_count' => 'required|integer|min:1',
                'whatsapp' => 'string|max:13',
            ]);

            $guest = Broadcast::where('guest_name', $request->guest_name)->first();

            if ($guest) {
                $noHP = $guest->guest_phone;
            } else {
                $noHP = $request->whatsapp;
            }

            Guest::create([
                'category_id' => $request->category_id,
                'guest_name' => $request->guest_name,
                'arrival_date' => now()->toDateString(),
                'arrival_time' => now()->toTimeString(),
                'guest_count' => $request->guest_count,
                'whatsapp' => $noHP,
            ]);

            return redirect()->back()->with('success', 'Data tamu berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data tamu: ' . $e->getMessage());
        }
    }

    public function uploadPhoto(Request $request)
    {

        $request->validate([
            'image' => 'required|string',
            'guest_name' => 'required|string',
        ]);

        $image = $request->input('image');
        $guestName = Str::slug($request->input('guest_name'));

        preg_match("/^data:image\/(png|jpeg);base64,/", $image, $match);
        $image = preg_replace("/^data:image\/(png|jpeg);base64,/", '', $image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        $extension = $match[1] ?? 'png';
        $fileName = $guestName . '-' . now()->format('Ymd_His') . '.' . $extension;
        $filePath = 'guest_photos/' . $fileName;

        $guest = Guest::where('guest_name', $request->input('guest_name'))->first();

        if ($guest) {
            if ($guest->photo_guest && Storage::disk('public')->exists($guest->photo_guest)) {
                Storage::disk('public')->delete($guest->photo_guest);
            }
        }

        Storage::disk('public')->put($filePath, $imageData);

        if ($guest) {
            $guest->photo_guest = $filePath;
            $guest->save();
        }



        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil disimpan',
            'path' => $filePath,
        ]);
    }
}
