<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    public function indicatorChildren()
    {
        return $this->hasMany(Indicator::class, 'parent_id', 'id');
    }

    public function hasParent()
    {
        return $this->hasOne(Indicator::class, 'parent_id', 'id');
    }

    public function poorPopulations()
    {
        return $this->belongsTo(DataPoorPopulation::class, 'indicator_id', 'id');
    }
}
