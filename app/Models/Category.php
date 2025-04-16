<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function broadcasts()
    {
        return $this->hasMany(Broadcast::class);
    }
}
