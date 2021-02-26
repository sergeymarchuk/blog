<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase {
    public function test_about_page_availability(): void {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
