<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filetype extends Model
{
    protected $fillable = ['type', ];

    public function file(){
        return $this->hasMany('App\File' , 'filetype_id' , 'id');
    }
}
