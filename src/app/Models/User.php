<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'rolesId',
        'email',
        'email_verified_at',
        'password',       
        'action'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne('App\Models\Profile','userId','id');
    }
    public function token_user(){
        return $this->hasOne('App\Models\TokenUser','userId','id');
    }
    public function timeTracking(){
        return $this->hasMany('App\Models\Time_Tracking','userId','id');
    }

    public function UserGroup(){
        return $this->belongsToMany('App\Models\UserGroup','user_group','id','groupId');
    }
}
