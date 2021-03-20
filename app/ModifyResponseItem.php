<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyResponseItem extends Model
{
    protected $fillable=[
        'modify_type_name_id' , 'value' , 'modify_response_id', 'pic'
    ];

    public function getTypeName(){
        return $this->belongsTo('App\ModifyTypeName' , 'modify_type_name_id' , 'id');
    }

    public function response(){
        return $this->belongsTo('App\ModifyResponse' , 'modify_response_id' , 'id');
    }
}
