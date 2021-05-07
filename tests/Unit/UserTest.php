<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_can_have_many_blogs()
    {
        $user = $this->createUser();
        $post = $this->createPost(['user_id' => $user->id]);

        $this->assertInstanceOf(Post::class, $user->blogs[0]);
    }
}
