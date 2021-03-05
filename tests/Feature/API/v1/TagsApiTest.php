<?php

namespace Tests\Feature\APi\v1;

use Tests\TestCase;

class TagsApiTest extends TestCase {
    public function test_api_get_tags(): void {
        $response = $this->Json('GET', '/api/v1/tags', ['perPage' => 50]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    ['id', 'name']
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

    public function test_api_create_tag(): void {
        $tagName = bin2hex(random_bytes(5));
        $response = $this->json('POST', '/api/v1/tags', ['name' => $tagName]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'name']])
            ->assertJsonPath('data.name', $tagName);
    }

    public function test_api_update_tag(): void {
        $tagName = bin2hex(random_bytes(5));
        $response = $this->json('POST', '/api/v1/tags', ['name' => $tagName]);

        $id = $response['data']['id'];
        $newTagName = bin2hex(random_bytes(5));

        $response = $this->json('PUT', "/api/v1/tags/{$id}", ['name' => $newTagName]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'name']])
            ->assertJsonPath('data.name', $newTagName);
    }

    public function test_api_delete_tag(): void {
        $tagName = bin2hex(random_bytes(5));
        $response = $this->json('POST', '/api/v1/tags', ['name' => $tagName]);
        $id = $response['data']['id'];
        $this->assertDatabaseHas('tags', ['id' => $id]);

        $response = $this->json('DELETE', "/api/v1/tags/{$id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('tags', ['id' => $id]);
    }

    public function test_api_autocomplete_tag(): void {
        $response = $this->json('GET', '/api/v1/tag/autocomplete', ['name' => rand(1, 20)]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    ['id', 'text']
                ]
            ]);
    }
}
