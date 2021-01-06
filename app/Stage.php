<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{

    protected $table = "stages";
    protected $fillable = ['id' , 'name' ,  'created_at' , 'updated_at'];


    public function levels(){
        return $this->hasMany('App\Level' , 'stage_id' , 'id');
    }
}
