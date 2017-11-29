<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = ['code', 'booked', 'free', 'price', 'image', 'event_id', 'company_id'];

    public function event()
    {
        return $this->belongsTo('VirtualExpo\Event');
    }

    public function company()
    {
        return $this->belongsTo('VirtualExpo\Company');
    }

    public function visitors()
    {
        return $this->belongsToMany('VirtualExpo\User', 'visitor_stands', 'stand_id', 'visitor_id');
    }
}
