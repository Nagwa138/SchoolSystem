<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_Type extends Model
{
    protected $fillable = ['type', ];

    public function file(){
        return $this->hasMany('App\File' , 'file_type_id' , 'id');
    }
}
