<?php

namespace Yuges\Pinnable\Interfaces;

use Yuges\Pinnable\Models\Pin;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Pinnable
{
    public function pins(): MorphMany;

    public function pin(?Pinner $pinner = null): Pin;

    public function unpin(?Pinner $pinner = null): static;

    public function togglePin(?Pinner $pinner = null): ?Pin;

    public function defaultPinner(): ?Pinner;
}
