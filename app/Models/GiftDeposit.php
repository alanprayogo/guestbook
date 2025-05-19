<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'guest_name',
        'status',
        'note',
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
