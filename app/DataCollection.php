<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataCollection extends Model
{
    protected  $table = 'data_collection';

    public function data()
    {
        return $this->hasMany(Data::class, 'data_id', 'id');
    }
}
