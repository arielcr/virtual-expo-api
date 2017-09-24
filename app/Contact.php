<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'telephone', 'administrator', 'company_id'];

    public function company()
    {
        return $this->belongsTo('VirtualExpo\Company');
    }
}
