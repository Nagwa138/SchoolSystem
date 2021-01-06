<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['parent_id' , 'user_id' , 'first_name' , 'middle_name' , 'last_name' , 'gender' , 'religion' , 'date_of_birthday' , 'email' ,  'password'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }

    public function parent(){
        return $this->belongsTo('App\Parents' , 'parent_id' , 'id');
    }

    public function level(){
        return $this->belongsTo('App\Level' , 'level_id' , 'id');
    }
}
