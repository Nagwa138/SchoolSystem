<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['filetype_id' , 'user_id', 'file'];

    public function filetype(){
        return $this->belongsTo('App\Filetype' , 'filetype_id', 'id');
    }
}
