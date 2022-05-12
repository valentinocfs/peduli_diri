<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;

    protected $table = 'perjalanan';

    protected $fillable = [
        'id_user',
        'lokasi',
        'jam',
        'suhu',
        'tanggal'
    ];
}
