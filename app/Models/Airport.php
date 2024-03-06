<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $icao
 * @property string $iata
 * @property string $name
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $timezone
 */
class Airport extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'icao',
        'iata',
        'name',
        'city',
        'state',
        'country',
        'timezone',
    ];
}
