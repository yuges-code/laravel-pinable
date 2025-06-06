<?php

namespace Yuges\Pinnable\Observers;

use Illuminate\Database\Eloquent\Model;

class PinObserver
{
    public function saving(Model $model): void
    {

    }

    public function deleted(Model $model): void
    {

    }
}
