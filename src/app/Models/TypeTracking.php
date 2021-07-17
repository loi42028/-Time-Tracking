<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTracking extends Model
{
    use HasFactory;
    protected $table = 'type_tracking';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nametype',
    ];
}
