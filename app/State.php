<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'code', 'country_id'];

    public function country()
    {
        return $this->belongsTo('VirtualExpo\Country');
    }
    
    public function locations()
    {
        return $this->hasMany('VirtualExpo\Location');
    }

}
