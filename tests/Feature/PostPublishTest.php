<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostPublishTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_publish_a_blog_post()
    {
        $post = $this->createPost();

        $response = $this->put('/posts/' . $post->id, [
            'published_at' => now()
        ]);

        $response->assertRedirect('/posts');
        $this->assertNotNull($post->fresh()->published_at);
    }

    public function test_a_user_can_unpublish_a_blog_post()
    {
        $post = $this->createPost([
            'published_at' => now()
        ]);

        $response = $this->put('/posts/' . $post->id, [
            'published_at' => null
        ]);

        $response->assertRedirect('/posts');
        $this->assertNull($post->fresh()->published_at);
    }
}
