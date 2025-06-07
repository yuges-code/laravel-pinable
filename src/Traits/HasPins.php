<?php

namespace Yuges\Pinnable\Traits;

use Yuges\Pinnable\Models\Pin;
use Yuges\Pinnable\Config\Config;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Yuges\Pinnable\Interfaces\Pinner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property Collection<array-key, Pin> $pins
 */
trait HasPins
{
    public function pins(): MorphToMany
    {
        /** @var Model $this */
        return $this
            ->morphToMany(
                Config::getPinClass(Pin::class),
                Config::getPinnableRelationName('pinnable')
            )
            ->withTimestamps();
    }
}
