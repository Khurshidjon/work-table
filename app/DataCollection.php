<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataCollection extends Model
{
    protected  $table = 'data_collection';

    public const COLLECTION_STATUS_NEW = 0;
    public const COLLECTION_STATUS_MODERATED = 1;
    public const COLLECTION_STATUS_CANCELLED = 2;

    public static function statusAttribute()
    {
        return [
            self::COLLECTION_STATUS_NEW => 'Новый',
            self::COLLECTION_STATUS_MODERATED => 'Публиковать',
            self::COLLECTION_STATUS_CANCELLED => 'Отменить публикацию',
        ];
    }


    public function poorFamilies()
    {
        return $this->hasMany(PoorFamily::class, 'data_collection_id', 'id');
    }

    public function formOfSupplies()
    {
        return $this->hasMany(FormOfSupply::class, 'data_collection_id', 'id');
    }

    public function helpToCompanies()
    {
        return $this->hasMany(HelpToCompany::class, 'data_collection_id', 'id');
    }

    public function updatePoorFamily()
    {
        return $this->belongsTo(PoorFamily::class, 'id', 'data_collection_id');
    }

    public function updateFormOfSupplies()
    {
        return $this->belongsTo(FormOfSupply::class, 'id', 'data_collection_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

}
