<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = ['id' , 'user1' , 'user2' , 'friendship' , 'created_at' , 'updated_at'];

    public function user1(){
        return $this->belongsTo('App\User' , 'user2' , 'id');
    }
}
