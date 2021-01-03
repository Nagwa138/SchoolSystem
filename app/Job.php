<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name'
        ];

    public function user(){
        return $this->hasMany('App\User' , 'job_id' , 'id');
    }
}
