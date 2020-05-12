<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPoorPopulation extends Model
{
    public const STATUS_NEW = 1;
    public const STATUS_MODERATED = 2;
    public const STATUS_CANCELLED = 3;

    public static function statusAttribute()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_MODERATED => 'Публиковать',
            self::STATUS_CANCELLED => 'Отменить публикацию',
        ];
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'district_id', 'id');
    }
    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'id');
    }

    public function units()
    {
        return $this->belongsTo(UnitMeasurement::class, 'unit_id', 'id');
    }

}
