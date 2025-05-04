<?php

namespace App\Http\Controllers;

use App\Models\GiftDeposit;
use App\Models\Guest;
use Illuminate\Http\Request;

class GiftDepositController extends Controller
{
    public function showGiftDeposit()
    {
        $giftDeposits = GiftDeposit::all();
        return view('pages.gift-handling', compact('giftDeposits'));
    }

    public function storeGiftDeposit(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string',
            'guest_id' => 'nullable|exists:guests,id',
        ]);

        $guestName = $request->guest_name;
        $guestId = $request->guest_id;
        $force = $request->input('force', false);

        if (!$force) {
            $existingGift = GiftDeposit::where(function ($query) use ($guestId, $guestName) {
                if ($guestId) {
                    $query->where('guest_id', $guestId);
                } else {
                    $query->where('guest_name', $guestName);
                }
            })->first();

            if ($existingGift) {
                $foundInGuests = Guest::where('guest_name', $guestName)->first();
                if ($foundInGuests) {
                    $guestId = $foundInGuests->id;
                }
                return response()->json([
                    'status' => 'exists',
                    'message' => 'Nama ini sudah menitipkan hadiahnya. Apakah Anda yakin ingin memasukkan lagi?',
                ]);
            }

            if (!$guestId) {
                $foundInGuests = Guest::where('guest_name', $guestName)->first();
                if (!$foundInGuests) {
                    return response()->json([
                        'status' => 'not_found_in_guests',
                        'message' => 'Nama ini tidak ada di daftar kedatangan tamu. Apakah Anda yakin ingin memasukkan nama ini?',
                    ]);
                } else {
                    $guestId = $foundInGuests->id;
                }
            }
        }

        GiftDeposit::create([
            'guest_id' => $guestId,
            'guest_name' => $guestName,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data penitipan hadiah berhasil disimpan.',
        ]);
    }
}
