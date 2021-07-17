<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'id','name','scopes'
    ];
    public function User(){
        return $this->belongsToMany('App\Models\User','id','userId');
    }
}
