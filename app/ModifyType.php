<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyType extends Model
{
    protected $fillable = [
       'type',
    ];

    public function typeName(){
        return $this->hasMany('App\ModifyTypeName' , 'modify_type_id' , 'id');
    }
}
