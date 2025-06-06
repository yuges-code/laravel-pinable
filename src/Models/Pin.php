<?php

namespace Vendor\Pinable\Models;

use Yuges\Package\Models\Model;
use Yuges\Orderable\Traits\HasOrder;
use Yuges\Orderable\Options\OrderOptions;
use Yuges\Orderable\Interfaces\Orderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pin extends Model implements Orderable
{
    use HasOrder, HasFactory;

    protected $table = 'pins';

    protected $guarded = ['id'];

    public function getTable(): string
    {
        return Config::getGroupTable() ?? $this->table;
    }

    public function orderable(): OrderOptions
    {
        $options = new OrderOptions();

        $options->query = fn (Builder $builder) => $builder
            ->where('grouperator_id', $this->grouperator_id)
            ->where('grouperator_type', $this->grouperator_type);

        return $options;
    }
}
