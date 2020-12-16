<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormUploadBukti extends Model
{
    use HasFactory;
    protected $table = "ruangan";
    protected $primaryKey = 'idruangan';
    protected $fillable = [
        'cs_id',
        'status',
        'bukti1',
        'bukti2',
        'bukti3',
        'bukti4'
    ];
}
