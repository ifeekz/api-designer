<?php

namespace Tests\Feature\Livewire;

use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\AuthModule\Models\ApiKey;

class ApiKeyManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_component()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('auth-module.api-key-manager')
            ->assertStatus(200);
    }

    /** @test */
    public function it_generates_a_new_api_key()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('auth-module.api-key-manager')
            ->call('generateKey')
            ->assertSessionHas('message', 'API key generated.');

        $this->assertCount(1, $user->apiKeys);
        $this->assertTrue($user->apiKeys->first()->active);
    }

    /** @test */
    public function it_revokes_an_existing_key()
    {
        $user = User::factory()->create();
        $key = ApiKey::generate($user);

        Livewire::actingAs($user)
            ->test('auth-module.api-key-manager')
            ->call('revokeKey', $key->id)
            ->assertSessionHas('message', 'API key revoked.');

        $this->assertFalse($key->fresh()->active);
    }

    /** @test */
    public function it_does_not_allow_revoking_keys_from_other_users()
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $otherKey = ApiKey::generate($userB);

        Livewire::actingAs($userA)
            ->test('auth-module.api-key-manager')
            ->call('revokeKey', $otherKey->id)
            ->assertStatus(404); // `findOrFail` should throw

        $this->assertTrue($otherKey->fresh()->active);
    }
}
