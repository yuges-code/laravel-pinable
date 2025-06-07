<?php

namespace Yuges\Pinnable\Tests\Feature;

use Yuges\Pinnable\Tests\TestCase;
use Yuges\Pinnable\Tests\Stubs\Models\User;

class HasTableTest extends TestCase
{
    public function testGettingTableName()
    {
        $this->assertEquals('users', User::getTableName());
    }
}
