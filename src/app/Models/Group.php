<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'id',
        'leader',
        'creator',
        'name',
        'desc',
    ];
    public function User(){
        return $this->belongsToMany('App\Models\User','user_group','groupId','userId');
    }
}