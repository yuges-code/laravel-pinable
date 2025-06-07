<?php

namespace Yuges\Pinnable\Traits;

use Yuges\Pinnable\Models\Pin;
use Yuges\Pinnable\Config\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property Collection<array-key, Pin> $pins
 */
trait CanPin
{
    public function pins(): MorphMany
    {
        /** @var Model $this */
        return $this
            ->morphMany(
                Config::getPinClass(Pin::class),
                Config::getPinnerRelationName('pinner')
            );
    }
}
