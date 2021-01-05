<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['parent_id' , 'user_id' , 'first_name' , 'middle_name' , 'last_name' , 'gender' , 'religion' , 'date_of_birthday' , 'email' ,  'password'];
}
