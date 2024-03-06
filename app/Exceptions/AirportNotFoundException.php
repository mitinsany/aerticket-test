<?php

namespace App\Exceptions;

class AirportNotFoundException extends BaseException
{
    protected string $messageText = 'Airport %s not found';

    public function __construct(string $airportName)
    {
        parent::__construct(sprintf($this->messageText, $airportName));
    }
}
