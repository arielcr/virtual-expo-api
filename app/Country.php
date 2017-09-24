<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code'];

    public function states()
    {
        return $this->hasMany('VirtualExpo\State');
    }
}
