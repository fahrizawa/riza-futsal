<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    // Tambahkan baris ini di sini:
    protected $fillable = [
        'name',
        'type',
        'price_per_hour'
    ];
}