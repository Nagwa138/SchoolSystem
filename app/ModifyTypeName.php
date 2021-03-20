<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyTypeName extends Model
{
    protected $fillable = [
      'name' , 'form_name' , 'modify_type_id' , 'job_id'
    ];


    public function type(){
        return $this->belongsTo('App\ModifyType' , 'modify_type_id' , 'id');
    }
}
