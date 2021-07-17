<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'device';
    const UPDATED_AT = null;
    protected $fillable = [
        'id',
        'publickey',
        'namedevice',
        'creator',
    ];
}
