<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogPageTest extends TestCase {
    public function test_about_blog_availability(): void {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }
}
