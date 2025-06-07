<?php

namespace Yuges\Pinnable\Tests\Stubs\Models;

use Yuges\Package\Models\Model;
use Yuges\Pinnable\Traits\HasPins;
use Yuges\Pinnable\Interfaces\Pinnable;

class Post extends Model implements Pinnable
{
    use HasPins;

    protected $table = 'posts';

    protected $guarded = ['id'];
}
