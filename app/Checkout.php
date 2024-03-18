<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function country()
    {
        return $this->belongsTo('App\Country' ,'country_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City' ,'city_id');
    }

    public function member()
    {
        return $this->belongsTo('App\Member' ,'member_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order' ,'checkout_id');
    }
}
