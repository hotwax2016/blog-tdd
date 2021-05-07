<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_validate_required_fields_for_posts()
    {
        $this->withExceptionHandling();

        $this->createAuthUser();
        $this->get('/posts/create');

        $response = $this->post('/posts');

        $response->assertRedirect('/posts/create');
        $response->assertSessionHasErrors(['title', 'body']);
    }
}
