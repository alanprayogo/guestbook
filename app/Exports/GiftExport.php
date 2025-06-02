<?php

namespace App\Exports;

use App\Models\GiftDeposit;
use Maatwebsite\Excel\Concerns\FromCollection;

class GiftExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GiftDeposit::all();
    }
}
