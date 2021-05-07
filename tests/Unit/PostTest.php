<?php

namespace Tests\Unit;

use App\User;
/* use PHPUnit\Framework\TestCase; */
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_post_belongs_to_user()
    {
        $user = $this->createUser();
        $post = $this->createPost(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $post->user);
    }
}
