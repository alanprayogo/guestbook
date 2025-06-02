<?php

namespace App\Imports;

use App\Models\Broadcast;
use Maatwebsite\Excel\Concerns\ToModel;

class GuestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Broadcast([
            'category_id' => $row[1],
            'the_organizer' => $row[2],
            'guest_name' => $row[3],
            'guest_phone' => $row[4],
            'url' => $row[5],
            'session' => $row[6],
            'no_table' => $row[7],
            'guest_limit' => $row[8],
            'kata_pengantar' => $row[9],
        ]);
    }
}
