<?php

namespace Yuges\Pinnable\Traits;

use Yuges\Pinnable\Models\Pin;
use Yuges\Pinnable\Config\Config;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Yuges\Pinnable\Interfaces\Pinner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property Collection<array-key, Pin> $pins
 */
trait HasPins
{
    public function pins(): MorphMany
    {
        /** @var Model $this */
        return $this
            ->morphMany(
                Config::getPinClass(Pin::class),
                Config::getPinnableRelationName('pinnable')
            );
    }

    public function pin(?Pinner $pinner = null): Pin
    {
        return Config::getCreatePinAction($this)->execute($pinner);
    }

    public function unpin(?Pinner $pinner = null): static
    {
        Config::getDeletePinAction($this)->execute($pinner);

        return $this;
    }

    public function togglePin(?Pinner $pinner = null): ?Pin
    {
        return Config::getTogglePinAction($this)->execute($pinner);
    }

    public function defaultPinner(): ?Pinner
    {
        /** @var ?Pinner */
        $pinner = Auth::user();

        return $pinner;
    }
}
