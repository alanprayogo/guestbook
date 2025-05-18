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
        'photo_guest',
        'whatsapp',
        'is_displayed',
        'is_invited',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function souvenirs()
    {
        return $this->hasMany(Souvenir::class);
    }

    public function giftDeposits()
    {
        return $this->hasMany(GiftDeposit::class);
    }
}
