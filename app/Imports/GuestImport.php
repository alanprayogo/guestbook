<?php

namespace App\Imports;

use App\Models\Broadcast;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuestImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new Broadcast([
            'guest_name' => $collection[0],
            'whatsapp' => $collection[1],
        ]);
    }
}
