<?php

namespace Yuges\Pinnable\Config;

use Yuges\Pinnable\Models\Pin;
use Yuges\Package\Enums\KeyType;
use Illuminate\Support\Collection;
use Yuges\Pinnable\Interfaces\Pinner;
use Yuges\Pinnable\Interfaces\Pinnable;
use Yuges\Pinnable\Observers\PinObserver;
use Yuges\Pinnable\Actions\CreatePinAction;
use Yuges\Pinnable\Actions\DeletePinAction;
use Yuges\Pinnable\Actions\TogglePinAction;
use Yuges\Pinnable\Observers\PinnerObserver;
use Yuges\Pinnable\Observers\PinnableObserver;

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

    public static function getPinnerKeyType(mixed $default = null): KeyType
    {
        return self::get('models.pinner.key', $default);
    }

    public static function getPinnerRelationName(mixed $default = null): string
    {
        return self::get('models.pinner.relation.name', $default);
    }

    /** @return class-string<Pinner> */
    public static function getPinnerDefaultClass(mixed $default = null): string
    {
        return self::get('models.pinner.default.class', $default);
    }

    /** @return Collection<array-key, class-string<Pinner>> */
    public static function getPinnerAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.pinner.allowed.classes', $default)
        );
    }

    /** @return class-string<PinnerObserver> */
    public static function getPinnerObserverClass(mixed $default = null): string
    {
        return self::get('models.pinner.observer', $default);
    }

    public static function getPinnableKeyType(mixed $default = null): KeyType
    {
        return self::get('models.pinnable.key', $default);
    }

    public static function getPinnableRelationName(mixed $default = null): string
    {
        return self::get('models.pinnable.relation.name', $default);
    }

    /** @return class-string<Pinnable> */
    public static function getPinnableDefaultClass(mixed $default = null): string
    {
        return self::get('models.pinnable.default.class', $default);
    }

    /** @return Collection<array-key, class-string<Pinnable>> */
    public static function getPinnableAllowedClasses(mixed $default = null): Collection
    {
        return Collection::make(
            self::get('models.pinnable.allowed.classes', $default)
        );
    }

    /** @return class-string<PinnableObserver> */
    public static function getPinnableObserverClass(mixed $default = null): string
    {
        return self::get('models.pinnable.observer', $default);
    }

    public static function getPermissionsAnonymous(mixed $default = false): bool
    {
        return self::get('permissions.anonymous', $default);
    }

    public static function getPermissionsDuplicate(mixed $default = false): bool
    {
        return self::get('permissions.duplicate', $default);
    }

    public static function getTogglePinAction(Pinnable $pinnable, mixed $default = null): TogglePinAction
    {
        return self::getTogglePinActionClass($default)::create($pinnable);
    }

    /** @return class-string<TogglePinAction> */
    public static function getTogglePinActionClass(mixed $default = null): string
    {
        return self::get('actions.toggle', $default);
    }

    public static function getCreatePinAction(Pinnable $pinnable, mixed $default = null): CreatePinAction
    {
        return self::getCreatePinActionClass($default)::create($pinnable);
    }

    /** @return class-string<CreatePinAction> */
    public static function getCreatePinActionClass(mixed $default = null): string
    {
        return self::get('actions.create', $default);
    }

    public static function getDeletePinAction(Pinnable $pinnable, mixed $default = null): DeletePinAction
    {
        return self::getDeletePinActionClass($default)::create($pinnable);
    }

    /** @return class-string<DeletePinAction> */
    public static function getDeletePinActionClass(mixed $default = null): string
    {
        return self::get('actions.delete', $default);
    }
}
