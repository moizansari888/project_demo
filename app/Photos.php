<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    protected $photo_folder = '/images/';

    protected $fillable = ['name'];

    public function getNameAttribute($value)
    {
        return $this->photo_folder . $value;
    }
}
