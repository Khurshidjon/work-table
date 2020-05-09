<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormOfSupply extends Model
{
    protected $casts = [
        'training' => 'array'
    ];

    public function liveStockSupplies()
    {
        return $this->hasMany(LivestockSupply::class, 'form_of_supply_id', 'id');
    }

    public function agroSupplies()
    {
        return $this->hasMany(AgroSupply::class, 'form_of_supply_id', 'id');
    }

    public function updateLivestockSupply()
    {
        return $this->belongsTo(LivestockSupply::class, 'id', 'form_of_supply_id');
    }

    public function updateAgroSupply()
    {
        return $this->belongsTo(AgroSupply::class, 'id', 'form_of_supply_id');
    }
}
