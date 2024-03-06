<?php

namespace App\Exceptions;

use Exception;

class FlightsNotFoundException extends BaseException
{
    protected $message = 'Any flights not found';
}
