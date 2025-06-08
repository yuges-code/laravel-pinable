<?php

namespace Yuges\Pinnable\Exceptions;

use Exception;

class InvalidPinner extends Exception
{
    public static function doesNotContainInAllowedConfig(string $class): self
    {
        return new static("Pinner class `{$class}` doesn't contain in allowed pinners config");
    }

    public static function doesNotContainInDefaultConfig(string $class): self
    {
        return new static("Pinner class `{$class}` doesn't contain in default pinner config");
    }
}
