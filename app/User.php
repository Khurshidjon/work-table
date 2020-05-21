<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    const ROLE_VILOYAT = 2;
    const ROLE_TUMAN = 3;

    const SECTOR_ONE = 1;
    const SECTOR_TWO = 2;
    const SECTOR_THREE = 3;
    const SECTOR_FOUR = 4;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'region_id', 'district_id', 'sector_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public static function roleTypes()
    {
        return [
            self::ROLE_VILOYAT => 'Вилоят',
            self::ROLE_TUMAN => 'Туман'
        ];
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public static function sectors()
    {
        return [
            self::SECTOR_ONE => '1 - сектор',
            self::SECTOR_TWO => '2 - сектор',
            self::SECTOR_THREE => '3 - сектор',
            self::SECTOR_FOUR => '4 - сектор'
        ];
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
