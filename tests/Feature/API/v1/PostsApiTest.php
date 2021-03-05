<?php

namespace Tests\Feature\APi\v1;

use Domain\Post\Models\Post;
use Tests\TestCase;

class PostsApiTest extends TestCase {
    public function test_api_get_posts(): void {
        $response = $this->Json('GET', '/api/v1/posts', ['perPage' => 20]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    ['id', 'title', 'slug', 'published_at', 'body', 'cover', 'tags']
                ],
                'meta' => [
                    'current_page',
                    'last_page',
                    'from',
                    'to',
                    'total'
                ]
            ]);
    }

    public function test_api_create_post(): void {
        $postName = bin2hex(random_bytes(10));
        $postBody = "<p>Some content</p>";
        $postPublishedAt = "2021-06-25";
        $postTags = [1, 2];
        $response = $this->json('POST', '/api/v1/posts', ['title' => $postName, 'body' => $postBody, 'published_at' => $postPublishedAt, 'tags' => $postTags]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'title', 'slug', 'published_at', 'body', 'cover', 'tags']])
            ->assertJsonPath('data.title', $postName)
            ->assertJsonPath('data.body', $postBody)
            ->assertJsonPath('data.published_at', $postPublishedAt);

        foreach ($response['data']['tags']  as $tag) {
            $this->assertTrue(in_array($tag['id'], $postTags));
        }
    }

    public function test_api_update_post(): void {
        $postTitle = bin2hex(random_bytes(10));
        $postBody = "<p>Some content</p>";
        $postPublishedAt = "2021-06-25";
        $postTags = [1, 2];
        $response = $this->json('POST', '/api/v1/posts', ['title' => $postTitle, 'body' => $postBody, 'published_at' => $postPublishedAt, 'tags' => $postTags]);
        $id = $response['data']['id'];

        $newPostTitle =  bin2hex(random_bytes(10));
        $newPostBody = "<p>Some content</p><p>New content</p>";
        $response = $this->json('PUT', "/api/v1/posts/{$id}", ['title' => $newPostTitle, 'body' => $newPostBody]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'title', 'slug', 'published_at', 'body', 'cover', 'tags']])
            ->assertJsonPath('data.title', $newPostTitle)
            ->assertJsonPath('data.body', $newPostBody);
    }

    public function test_api_delete_post(): void {
        $postName = bin2hex(random_bytes(10));
        $postBody = "<p>Some content</p>";
        $postPublishedAt = "2021-06-25";
        $postTags = [1, 2];
        $response = $this->json('POST', '/api/v1/posts', ['title' => $postName, 'body' => $postBody, 'published_at' => $postPublishedAt, 'tags' => $postTags]);
        $id = $response['data']['id'];
        $post = Post::findOrFail($id);
        $this->assertDatabaseHas('posts', ['id' => $id]);

        $response = $this->json('DELETE', "/api/v1/posts/{$id}");
        $response->assertStatus(200);
        $this->assertSoftDeleted($post);
    }
}
