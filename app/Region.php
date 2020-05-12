<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function dataCollection()
    {
        return $this->belongsTo(DataCollection::class, 'region_id', 'id');
    }
}
