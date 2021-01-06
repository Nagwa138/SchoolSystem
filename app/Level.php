<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['stage_id' , 'name'];

    public function stage(){
        return $this->belongsTo('App\Stage' , 'stage_id' , 'id');
    }

    public function student(){
        return $this->hasMany('App\Student' , 'level_id' , 'id');
    }

}
