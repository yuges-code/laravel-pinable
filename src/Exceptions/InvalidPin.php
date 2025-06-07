<?php

namespace Yuges\Pinnable\Exceptions;

use Exception;
use TypeError;
use Yuges\Pinnable\Models\Pin;

class InvalidPin extends Exception
{
    public static function doesNotImplementPin(string $class): TypeError
    {
        $pin = Pin::class;

        return new TypeError("Pin class `{$class}` must implement `{$pin}`");
    }
}
