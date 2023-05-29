<?php

namespace Main\app\Exceptions;

use Exception;

abstract class BadFunctionCallException extends Exception
{
    /* Inherited properties */
    // protected string $message = "";
    private string $string = "";
    // protected int $code;
    // protected string $file = "";
    // protected int $line;
    private array $trace = [];

    public function __construct()
    {
        // parent::class();
    }
}
