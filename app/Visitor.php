<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['name', 'email', 'telephone'];

    public function stands()
    {
        return $this->belongsToMany('VirtualExpo\Stand', 'visitor_stands', 'visitor_id', 'stand_id');
    }
}
