<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'address', 'latitude', 'longitude', 'state_id'];

    public function state()
    {
        return $this->belongsTo('VirtualExpo\State');
    }
}
