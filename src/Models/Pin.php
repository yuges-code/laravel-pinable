<?php

namespace Yuges\Pinnable\Models;

use Yuges\Package\Models\Model;
use Yuges\Pinnable\Config\Config;
use Yuges\Orderable\Traits\HasOrder;
use Yuges\Orderable\Options\OrderOptions;
use Yuges\Orderable\Interfaces\Orderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pin extends Model implements Orderable
{
    use HasOrder, HasFactory;

    protected $table = 'pins';

    protected $guarded = ['id'];

    public function getTable(): string
    {
        return Config::getPinTable() ?? $this->table;
    }

    public function pinner(): MorphTo
    {
        return $this->morphTo();
    }

    public function pinnable(): MorphTo
    {
        return $this->morphTo();
    }

    public function orderable(): OrderOptions
    {
        $options = new OrderOptions();

        $options->query = fn (Builder $builder) => $builder
            ->where('pinner_id', $this->pinner_id)
            ->where('pinner_type', $this->pinner_type);

        return $options;
    }
}
