<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testSubmission()
    {
        $response = $this->postJson('/api/submit', []);
        $response->assertStatus(400)->assertJsonStructure(['errors' => ['name', 'email', 'message']]);
    }

    public function testSubmissionValidation()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/submit', $payload);
        $response->assertStatus(200)
            ->assertJson(['message' => 'Submission is being processed']);
    }
}
