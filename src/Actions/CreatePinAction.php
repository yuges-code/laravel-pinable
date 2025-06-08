<?php

namespace Yuges\Pinnable\Actions;

use Exception;
use Yuges\Pinnable\Models\Pin;
use Yuges\Pinnable\Config\Config;
use Yuges\Pinnable\Interfaces\Pinner;
use Yuges\Pinnable\Interfaces\Pinnable;
use Illuminate\Database\Eloquent\Model;
use Yuges\Pinnable\Exceptions\InvalidPinner;

class CreatePinAction
{
    public function __construct(
        protected Pinnable $pinnable
    ) {
    }

    public static function create(Pinnable $pinnable): self
    {
        return new static($pinnable);
    }

    public function execute(?Pinner $pinner = null): Pin
    {
        $pinner ??= $this->getDefaultPinner();

        $this->validatePinner($pinner);

        if (! $pinner instanceof Model) {
            throw new Exception('Pinner is not eloquent model');
        }

        $attributes = [
            'pinner_id' => $pinner?->getKey() ?? null,
            'pinner_type' => $pinner?->getMorphClass() ?? null,
        ];

        if (Config::getPermissionsDuplicate()) {
            return $this->pinnable->pins()->create($attributes);
        }

        $pin = $this->pinnable->pins()->getQuery()->whereMorphedTo('pinner', $pinner)->first();

        return $pin ?? $this->pinnable->pins()->create($attributes);
    }

    public function validatePinner(?Pinner $pinner = null): void
    {
        if (! $pinner) {
            return;
        }

        $class = get_class($pinner);
        $allowed = Config::getPinnerAllowedClasses()->push(Config::getPinnerDefaultClass());

        if (! $allowed->contains($class)) {
            throw InvalidPinner::doesNotContainInAllowedConfig($class);
        }
    }

    public function getDefaultPinner(): ?Pinner
    {
        $pinner = $this->pinnable->defaultPinner();

        if (! $pinner) {
            return null;
        }

        $class = get_class($pinner);

        if (Config::getPinnerDefaultClass() !== $class) {
            throw InvalidPinner::doesNotContainInDefaultConfig($class);
        }

        return $pinner;
    }
}
