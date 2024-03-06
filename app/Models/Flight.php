<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property Airport $departureAirport
 * @property Airport $arrivalAirport
 * @property Transporter $transporter
 * @property string $flight_number
 * @property int $duration
 * @property Carbon $departure_at
 */
class Flight extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'flight_number',
        'departure_at'
    ];

    protected $casts = [
        'departure_at' => 'datetime',
    ];

    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }
}
