<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
