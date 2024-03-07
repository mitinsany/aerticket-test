<?php

namespace App\Exceptions;

use Exception;

class WrongRequestException extends Exception
{
    public $message = 'Wrong request';
}
