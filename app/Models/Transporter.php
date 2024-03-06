<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $name
 */
class Transporter extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];
}
