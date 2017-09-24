<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = ['date', 'event_id'];
}
