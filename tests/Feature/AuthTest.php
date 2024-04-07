<?php

namespace Tests\Feature;

use App\Models\Progress;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function testAddProgress()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Progress::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/api/events');

        $response->assertStatus(200)
            ->assertJsonStructure([

                'data'
            ]);
    }

    public function test_example()
    {

        User::factory()->create([
            'name' => 'Anwar',
            'email' => 'tes@example.com',
            'password' => 'password',

        ]);

        return response()->json(200);
    }

    public function testStatus()
    {

        $user = User::factory()->create();

        $session = Progress::factory()->create(['user_id' => $user->id]);

        $updatedSessionData = [

            'status' => "1",
        ];

        $response = $this->actingAs($user)->patch('/api/event/' . $session->id, $updatedSessionData);



        $response->assertStatus(200)
            ->assertJson([
                'message' => 'the session status is updated' && 'the session has finished'
            ]);
    }


    public function testProStatus()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $progress = Progress::factory()->create(['user_id' => $user->id]);

        $updatedSessionData = [
            'status' => "1",
        ];

        $response = $this->patch("/api/event/{$progress->id}", $updatedSessionData);

        $response->assertStatus(200);
    }
    public function testDestroy()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $progress = Progress::factory()->create(['user_id' => $user->id]);

        $response = $this->delete("/api/events/{$progress->id}");
        $response->assertStatus(200);
    }
}
