<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parent(){
        return $this->hasOne('App\Parents' , 'user_id' , 'id');
    }
    public function student(){
        return $this->hasOne('App\Student' , 'user_id' , 'id');
    }

    public function job(){
        return $this->belongsTo('App\Job' , 'job_id', 'id');
    }

    public function friends(){
        return $this->hasMany('App\Friend' , 'user2' , 'id');
    }


    public function request(){
        return $this->hasMany('App\ModifyRequest' , 'modify_request_id' , 'id');
    }


    public function response(){
        return $this->hasMany('App\ModifyResponse' , 'modify_response_id' , 'id');
    }


}
