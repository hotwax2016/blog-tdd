<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Blog;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_see_blog_posts()
    {
        $this->withoutExceptionHandling();

        // past / scene / prepare
        Blog::create(['title' => 'first blog post']);
        
        // present / action / act
        $response = $this->get('/blogs');

        // future / assertion / asset
        $response->assertStatus(200);
        $response->assertSee('Blog title');
    }
}
