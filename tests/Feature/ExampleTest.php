<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get("/");

        $response->assertStatus(200);
    }

    public function test_add_progress()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/api/events', [
            'name' => "aanoa",
            'measurments' => 29,

        ]);

        $response->assertStatus(200);
    }
}
