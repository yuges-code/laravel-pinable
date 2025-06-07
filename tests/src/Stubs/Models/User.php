<?php

namespace Yuges\Pinnable\Tests\Stubs\Models;

use Yuges\Package\Models\Model;
use Yuges\Pinnable\Traits\CanPin;
use Yuges\Pinnable\Interfaces\Pinner;

class User extends Model implements Pinner
{
    use CanPin;

    protected $table = 'users';

    protected $guarded = ['id'];
}
