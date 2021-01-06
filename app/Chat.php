<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['id' , 'sender' , 'receiver' , 'created_at' , 'updated_at' , 'msg'];
}
