<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table = "logStatusKebersihan";
    protected $fillable = [
        'ruang',
        'PenanggungJawab',
        'status',
        'tanggal',
        'bukti'
    ];
}
