<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Post;

class PostImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_an_authenticated_user_can_upload_image_along_with_the_blog_post()
    {
        Storage::fake();

        $this->createAuthUser();

        $data = factory(Post::class)->raw();

        $response = $this->post('/posts', $data);

        $this->assertDatabaseHas('posts', ['image_url' => $data['image_url']]);
        Storage::assertExists('photo1.jpg');
    }
}
