<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['file_type_id' , 'user_id', 'file'];

    public function file_type(){
        return $this->belongsTo('App\File_type' , 'file_type_id', 'id');
    }
}
