<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{

    protected $fillable = [ 'name'];


    public function levels(){
        return $this->hasMany('App\Level' , 'stage_id' , 'id');
    }
}
