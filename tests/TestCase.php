<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Post;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setup(): void
    {
        parent::setup();
        $this->withoutExceptionHandling();
    }

    protected function createPost($args = [], $count = null)
    {
        return factory(Post::class, $count)->create($args);
    }

    protected function createUser($args = [], $count = null)
    {
        return factory(User::class, $count)->create($args);
    }

    protected function createAuthUser($args = [])
    {
        $user = $this->createUser($args);
        $this->actingAs($user);

        return $user;
    }
}
