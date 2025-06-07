<?php

namespace Yuges\Pinnable\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Pinner
{
    public function pins(): MorphMany;
}
