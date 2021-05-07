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

    public function test_user_can_upload_image_along_with_the_blog_post()
    {
        Storage::fake();

        $data = factory(Post::class)->raw();

        $response = $this->post('/posts', $data);

        $this->assertDatabaseHas('posts', ['image_url' => $data['image_url']]);
        Storage::assertExists('photo1.jpg');

    }    
}
