<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'guest_name',
        'guest_whatsapp',
        'session',
        'guest_limit',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
