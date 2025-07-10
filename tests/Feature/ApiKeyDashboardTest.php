<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ApiKeyDashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_cannot_access_api_keys_dashboard()
    {
        $response = $this->get('/dashboard/api-keys');

        $response->assertRedirect('/login'); // or your custom redirect path
    }

    /** @test */
    public function authenticated_user_can_access_api_keys_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard/api-keys');

        $response->assertStatus(200);
        $response->assertSee('API Key Management');
        $response->assertSeeLivewire('auth-module.api-key-manager');
    }
}
