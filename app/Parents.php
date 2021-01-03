<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{

    protected $fillable = [
        'father_first_name', 'mother_first_name',  'father_middle_name', 'mother_middle_name',  'father_last_name', 'mother_last_name',  'father_phone_number', 'mother_phone_number', 'number_of_children' , 'email' , 'job_id'
    ];


    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }


}
