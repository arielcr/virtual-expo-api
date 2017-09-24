<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'description', 'logo'];

    public function contacts()
    {
        return $this->hasMany('VirtualExpo\Contact');
    }

    public function documents()
    {
        return $this->hasMany('VirtualExpo\Document');
    }

    public function stands()
    {
        return $this->hasMany('VirtualExpo\Stand');
    }
}
