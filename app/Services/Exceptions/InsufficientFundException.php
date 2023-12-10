<?php

namespace App\Services\Exceptions;

use Exception;

class InsufficientFundException extends Exception
{
    protected $message = "insufficient fund";
}
