<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //protected $fillable = ['name', 'contact_person'];use HasFactory;

    // Baris ini SANGAT PENTING agar data tidak diblokir saat disimpan
    protected $fillable = ['name', 'contact_person'];
}
