<?php

namespace Yuges\Pinnable\Providers;

use Yuges\Pinnable\Models\Pin;
use Yuges\Package\Data\Package;
use Yuges\Pinnable\Config\Config;
use Yuges\Pinnable\Observers\PinObserver;
use Yuges\Pinnable\Exceptions\InvalidPin;

class PinnableServiceProvider extends \Yuges\Package\Providers\PackageServiceProvider
{
    protected string $name = 'laravel-pinnable';

    public function configure(Package $package): void
    {
        $pin = Config::getPinClass(Pin::class);

        if (! is_a($pin, Pin::class, true)) {
            throw InvalidPin::doesNotImplementPin($pin);
        }

        $package
            ->hasName($this->name)
            ->hasConfig('pinnable')
            ->hasMigrations([
                'create_pins_table',
            ])
            ->hasObserver($pin, PinObserver::class);
    }
}
