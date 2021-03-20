<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyResponse extends Model
{

    protected $fillable = [
        'approved', 'user_id',  'job_id', 'modify_request_id'
    ];


    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }


    public function request(){
        return $this->belongsTo('App\ModifyRequest' , 'modify_request_id' , 'id');
    }


    public function items(){
        return $this->hasMany('App\ModifyResponseItem' , 'modify_response_id' , 'id');
    }
}
