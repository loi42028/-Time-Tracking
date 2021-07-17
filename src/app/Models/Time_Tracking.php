<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Time_Tracking extends Model
{
    use HasFactory;
    protected $table = 'time_tracking';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'userId',
        'type',
        'time',
        'refevence',
    ];
}
