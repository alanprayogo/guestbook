<?php

namespace App\Exports;

use App\Models\Broadcast;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Broadcast::all();
    }
}
