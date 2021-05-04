<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    public function test_user_can_see_blog_posts()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->get('/blogs');

        $response->assertStatus(200);
        $response->assertSee('Blog title');
    }
}
