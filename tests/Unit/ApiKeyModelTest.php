<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\AuthModule\Models\ApiKey;

class ApiKeyModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_generate_a_new_api_key()
    {
        $user = User::factory()->create();

        $key = ApiKey::generate($user);

        $this->assertInstanceOf(ApiKey::class, $key);
        $this->assertEquals($user->id, $key->user_id);
        $this->assertNotEmpty($key->key);
        $this->assertTrue($key->active);
    }

    /** @test */
    public function generated_keys_are_unique()
    {
        $user = User::factory()->create();

        $keys = collect(range(1, 5))->map(fn() => ApiKey::generate($user)->key);

        $this->assertEquals(5, $keys->unique()->count());
    }

    /** @test */
    public function an_api_key_can_be_deactivated()
    {
        $user = User::factory()->create();

        $key = ApiKey::generate($user);
        $this->assertTrue($key->active);

        $key->update(['active' => false]);

        $this->assertFalse($key->fresh()->active);
    }

    /** @test */
    public function a_user_can_have_multiple_keys()
    {
        $user = User::factory()->create();

        ApiKey::generate($user);
        ApiKey::generate($user);

        $this->assertCount(2, $user->apiKeys);
    }
}
