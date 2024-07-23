<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public function film()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
