<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function questions()
    {
        return $this->hasMany('App\ServiceQuestion' , 'service_id');
    }
}
