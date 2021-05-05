<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Post;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setup():void
    {
        parent::setup();
        $this->withoutExceptionHandling();
    }

    protected function createPost($args = [], $count = null)
    {
        return factory(Post::class, $count)->create($args);
    }
}
