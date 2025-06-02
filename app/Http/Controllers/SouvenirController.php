<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Souvenir;
use App\Exports\SouvenirExport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class SouvenirController extends Controller
{
    public function showSouvenirs()
    {
        $souvenir = Souvenir::with(['guest', 'guest.category'])
            ->orderBy('created_at', 'asc')
            ->get();
        if (!request()->ajax()) {
            return view('pages.souvenir-desk', compact('souvenir'));
        }
        return DataTables::of($souvenir)
            ->addIndexColumn()
            ->addColumn('category_name', fn($row) => $row->guest->category->category_name ?? '-')
            ->make(true);
    }

    public function storeSouvenirs(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string',
            'guest_id' => 'nullable|exists:guests,id',
        ]);

        $guestName = $request->guest_name;
        $guestId = $request->guest_id;
        $force = $request->input('force', false);

        if (!$force) {
            $existingSouvenir = Souvenir::where(function ($query) use ($guestId, $guestName) {
                if ($guestId) {
                    $query->where('guest_id', $guestId);
                } else {
                    $query->where('guest_name', $guestName);
                }
            })->first();

            if ($existingSouvenir) {
                $foundInGuests = Guest::where('guest_name', $guestName)->first();
                if ($foundInGuests) {
                    $guestId = $foundInGuests->id;
                }
                return response()->json([
                    'status' => 'exists',
                    'message' => 'Nama ini sudah pernah ambil souvenir. Apakah Anda yakin ingin memasukkan lagi?',
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

        Souvenir::create([
            'guest_id' => $guestId,
            'guest_name' => $guestName,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data souvenir berhasil disimpan.',
        ]);
    }

    public function exportSouvenir()
    {
        return Excel::download(new SouvenirExport, 'data-souvenir.xlsx');
    }
}
