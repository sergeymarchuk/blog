<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterPageTest extends TestCase {
    public function test_register_page_availability(): void {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
