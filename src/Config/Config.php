<?php

namespace Yuges\Pinnable\Config;

use Yuges\Pinnable\Models\Pin;
use Yuges\Package\Enums\KeyType;
use Yuges\Pinnable\Observers\PinObserver;

class Config extends \Yuges\Package\Config\Config
{
    const string NAME = 'pinnable';

    public static function getPinTable(mixed $default = null): string
    {
        return self::get('models.pin.table', $default);
    }

    /** @return class-string<Pin> */
    public static function getPinClass(mixed $default = null): string
    {
        return self::get('models.pin.class', $default);
    }

    public static function getPinKeyType(mixed $default = null): KeyType
    {
        return self::get('models.pin.key', $default);
    }

    /** @return class-string<PinObserver> */
    public static function getPinObserverClass(mixed $default = null): string
    {
        return self::get('models.pin.observer', $default);
    }
}
