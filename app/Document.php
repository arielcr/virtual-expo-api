<?php

namespace VirtualExpo;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'path', 'company_id'];

    public function company()
    {
        return $this->belongsTo('VirtualExpo\Company');
    }
}
