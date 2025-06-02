<?php

namespace App\Exports;

use App\Models\Souvenir;
use Maatwebsite\Excel\Concerns\FromCollection;

class SouvenirExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Souvenir::all();
    }
}
