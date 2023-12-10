<?php

namespace App\Services\Exceptions;

use Exception;

class InvalidAmountException extends Exception
{
    protected $message = "invalid amount";
}
