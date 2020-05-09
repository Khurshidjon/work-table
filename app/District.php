<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
