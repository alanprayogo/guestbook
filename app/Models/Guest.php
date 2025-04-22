<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'guest_name',
        'arrival_date',
        'arrival_time',
        'guest_count',
        'whatsapp',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
