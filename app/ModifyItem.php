<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifyItem extends Model
{
    protected $fillable=[
        'modify_type_name_id' , 'note' , 'modify_request_id',
        ];

    public function request(){
        return $this->belongsTo('App\ModifyRequest' , 'modify_request_id' , 'id');
    }

    public function getTypeName(){
        return $this->belongsTo('App\ModifyTypeName' , 'modify_type_name_id' , 'id');
    }
}
