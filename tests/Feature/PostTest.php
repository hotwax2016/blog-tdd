<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_see_list_of_published_blog_posts()
    {

        // past / scene / prepare
        $post = $this->createPost(['published_at' => now()], 2);
        $unPublishedPost = $this->createPost();

        // present / action / act
        $response = $this->get('/posts');

        // future / assertion / asset
        $response->assertStatus(200);
        $response->assertSee($post[0]->title);
        $response->assertSee($post[0]->title);
        $response->assertDontSee($unPublishedPost->title);
    }

    public function test_a_user_can_view_a_published_blog_post()
    {
        $post = $this->createPost(['published_at' => now()]);

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee($post->body);
    }

    public function test_a_user_cannot_view_an_unpublished_blog_post()
    {
        $this->withExceptionHandling();
        
        $post = $this->createPost(['published_at' => null]);

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(404);
    }

    public function test_a_user_can_store_a_blog_post()
    {
        $data = factory(Post::class)->raw();

        $response = $this->post('/posts', $data);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', $data);
    }

    public function test_a_user_can_delete_a_blog_page()
    {
        $post = $this->createPost();

        $response = $this->delete('/posts/' . $post->id);

        $response->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', $post->toArray());
    }

    public function test_a_user_can_update_a_blog_page()
    {
        $post = $this->createPost();
        $data = [
            'title' => 'updated title'
        ];

        $response = $this->put('/posts/' . $post->id, $data);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'updated title'
        ]);
    }

    public function test_a_user_get_a_form_to_submit_a_new_blog_post()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
        $response->assertSee('Create new blog post');
    }

    public function test_a_user_can_visit_a_form_to_edit_blog_page()
    {
        $post = $this->createPost();

        $response = $this->get('/posts/' . $post->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee('Edit blog page');
        $response->assertSee($post->title);
        $response->assertSee($post->body);
    }

}
