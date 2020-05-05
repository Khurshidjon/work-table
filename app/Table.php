<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
