<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public const TABLE_ONE = 1;
    public const TABLE_TWO = 2;
    public const TABLE_STATUS_ACTIVE = 1;
    public const TABLE_STATUS_INACTIVE = 0;


    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
