<?php

namespace App\Http\Controllers;

use App\Models\Broadcast;
use App\Models\BroadcastList;
use App\Models\Category;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    public function showGuest()
    {
        $category = Category::all();
        $listGuest = BroadcastList::with(['broadcast.category'])
            ->orderBy('created_at', 'asc')
            ->get();
        return view('pages.manage-guest', compact('category', 'listGuest'));
    }

    public function storeGuest(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_id'    => 'required|exists:categories,id',
                'guest_name'     => 'required|string',
                'session'        => 'required|in:Kursi 1,Kursi 2,Kursi 3,Kursi 4,Kursi 5',
                'guest_limit'    => 'required|in:1 Orang,2 Orang,3 Orang,4 Orang,5 Orang,6 Orang',
                'kata_pengantar' => 'required|string',
            ], [
                'category_id.required'    => 'Kategori harus dipilih.',
                'category_id.exists'      => 'Kategori yang dipilih tidak valid.',
                'guest_name.required'     => 'Nama tamu harus diisi.',
                'guest_name.string'       => 'Nama tamu harus berupa teks.',
                'session.required'        => 'Sesi harus dipilih.',
                'session.in'              => 'Sesi yang dipilih tidak valid.',
                'guest_limit.required'    => 'Batas tamu harus dipilih.',
                'guest_limit.in'          => 'Batas tamu yang dipilih tidak valid.',
                'kata_pengantar.required' => 'Kata pengantar harus diisi.',
                'kata_pengantar.string'   => 'Kata pengantar harus berupa teks.',
            ]);

            DB::transaction(function () use ($validated) {
                $broadcast = Broadcast::create([
                    'category_id'    => $validated['category_id'],
                    'session'        => $validated['session'],
                    'guest_limit'    => $validated['guest_limit'],
                    'kata_pengantar' => $validated['kata_pengantar'],
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

                    if ($name && $phone) {
                        BroadcastList::create([
                            'broadcast_id' => $broadcast->id,
                            'guest_name'   => $name,
                            'guest_phone'  => $phone,
                        ]);
                    } else {
                        Log::warning("Data kosong di baris ke-" . ($index + 1) . ": '$line'");
                    }
                }

                Log::info('Broadcast dan tamu berhasil disimpan', [
                    'broadcast_id' => $broadcast->id,
                    'total_tamu'   => count($lines),
                ]);
            });

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
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_phone' => 'required|string|max:20',
        ]);

        $guest = BroadcastList::findOrFail($request->id);

        $guest->guest_name = $request->guest_name;
        $guest->guest_phone = $request->guest_phone;
        $guest->save();

        return redirect()->back()->with('success', 'Data tamu berhasil diperbarui.');
    }

    public function deleteGuest($id)
    {
        $guest = BroadcastList::findOrFail($id);
        $broadcastId = $guest->broadcast_id;

        $guest->delete();

        $remaining = BroadcastList::where('broadcast_id', $broadcastId)->count();

        if ($remaining === 0) {
            $broadcast = Broadcast::find($broadcastId);
            if ($broadcast) {
                $broadcast->delete();
            }
        }

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
        $guest = BroadcastList::where('guest_name', $guestName)->first();

        if (!$guest) {
            return response()->json(['category_id' => null]);
        }

        return response()->json([
            'guest' => $guest->broadcast->category,
        ]);
    }

    public function storeGuestArrive(Request $request)
    {
        try {
            $request->validate([
                'guest_name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'guest_count' => 'required|integer|min:1',
            ]);

            $guest = BroadcastList::where('guest_name', $request->guest_name)->first();

            Guest::create([
                'category_id' => $request->category_id,
                'guest_name' => $request->guest_name,
                'arrival_date' => now()->toDateString(),
                'arrival_time' => now()->toTimeString(),
                'guest_count' => $request->guest_count,
                'whatsapp' => $guest->guest_phone,
            ]);

            return redirect()->back()->with('success', 'Data tamu berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data tamu: ' . $e->getMessage());
        }
    }
}
