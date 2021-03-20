<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyRequest extends Model
{

    protected $fillable = [
        'approved', 'user_id',  'job_id', 'note'
        ];


    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }

    public function items(){
        return $this->hasMany('App\ModifyItem' , 'modify_request_id' , 'id');
    }


    public function response(){
        return $this->hasOne('App\ModifyResponse' , 'modify_request_id' , 'id');
    }
}
