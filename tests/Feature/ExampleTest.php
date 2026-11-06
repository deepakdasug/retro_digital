<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Business Made Easy');
        $response->assertSee('with Retrotech');
        $response->assertSee('360° IT and Digital Solutions Company');
        $response->assertSee('Top Six Reasons to Trust Our IT Expertise');
        $response->assertSee('O-126, O-145, O-146 The Shopping Mall');
    }
}
