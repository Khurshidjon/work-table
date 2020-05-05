<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function data()
    {
        return $this->hasMany(Data::class);
    }
}
