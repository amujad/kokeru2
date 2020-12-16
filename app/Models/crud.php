<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'level'
    ];
}
