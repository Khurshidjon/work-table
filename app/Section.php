<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function data()
    {
        return $this->hasMany(Data::class);
    }
    public function hasParent()
    {
        return $this->hasMany(Section::class, 'parent_id', 'id');
    }
}
