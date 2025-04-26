<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'guest_name',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
