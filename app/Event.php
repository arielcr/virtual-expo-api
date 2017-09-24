<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'ticket_price', 'image', 'location_id'];

    public function location()
    {
        return $this->belongsTo('VirtualExpo\Location');
    }

    public function dates()
    {
        return $this->hasMany('VirtualExpo\Date');
    }

    public function stands()
    {
        return $this->hasMany('VirtualExpo\Stand');
    }
}
