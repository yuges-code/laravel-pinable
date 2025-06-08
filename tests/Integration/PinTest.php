<?php

namespace Yuges\Pinnable\Tests\Integration;

use Illuminate\Support\Facades\DB;
use Yuges\Pinnable\Config\Config;
use Yuges\Pinnable\Models\Pin;
use Yuges\Pinnable\Tests\TestCase;
use Yuges\Pinnable\Models\Pinnable;
use Yuges\Pinnable\Tests\Stubs\Models\User;
use Yuges\Pinnable\Tests\Stubs\Models\Post;

class PinTest extends TestCase
{
    public function testGroupPosts()
    {
        config(['pinnable.models.pinner.allowed.classes' => [User::class]]);

        $user = User::query()->create([
            'name' => 'Georgy',
            'email' => 'goshasafonov@yandex.ru',
            'password' => 'test',
        ]);

        $post = Post::query()->create([
            'title' => 'Post',
        ]);

        $pin = $post->pin($user);

        $this->assertDatabaseHas(Config::getPinClass(Pin::class)::getTableName(), [
            'pinnable_id' => $post->getKey(),
            'pinnable_type' => $post->getMorphClass(),
            'pinner_id' => $user->getKey(),
            'pinner_type' => $user->getMorphClass(),
        ]);
    }
}
