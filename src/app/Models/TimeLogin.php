<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLogin extends Model
{
    use HasFactory;
    protected $table = 'time_login';
    public $timestamps = false;
    protected $fillable = [
        'userId',
        'last_time_login',
    ];
}
