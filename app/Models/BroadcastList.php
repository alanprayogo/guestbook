<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastList extends Model
{
    use HasFactory;

    protected $fillable = [
        'broadcast_id',
        'guest_name',
        'guest_phone',
    ];

    public function broadcast()
    {
        return $this->belongsTo(Broadcast::class);
    }
}
