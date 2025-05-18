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
        'guest_phone',
        'url',
        'session',
        'no_table',
        'guest_limit',
        'kata_pengantar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function arrival()
    {
        return $this->hasOne(Guest::class, 'guest_name', 'guest_name');
    }
}
