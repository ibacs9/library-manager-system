<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Models\User;
use App\Services\AuthService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthTest extends TestCase
{
    public function test_login_calls_user_repository_and_returns_token()
    {
        // Mockolt user objektum (nem factory!)
        $mockedUser = Mockery::mock(User::class);
        $mockedUser->shouldReceive('createToken')
            ->once()
            ->andReturn((object)['plainTextToken' => 'mocked-token']);

        // Mockolt repository
        $mockedRepo = Mockery::mock(UserRepository::class);
        $mockedRepo->shouldReceive('findByEmail')
            ->once()
            ->andReturn($mockedUser);

        // Mockolt Auth
        \Illuminate\Support\Facades\Auth::shouldReceive('attempt')
            ->once()
            ->andReturn(true);

        // AuthService példány
        $authService = new AuthService($mockedRepo);

        // Meghívjuk
        $token = $authService->login([
            'email' => 'teszt@example.com',
            'password' => 'password',
        ]);

        // Ellenőrizzük
        $this->assertEquals('mocked-token', $token);
    }


    public function test_login_throws_exception_on_invalid_credentials()
    {
        Auth::shouldReceive('attempt')->once()->andReturn(false);

        $this->expectException(ValidationException::class);

        $mockedRepo = Mockery::mock(UserRepository::class);
        $authService = new AuthService($mockedRepo);

        $authService->login([
            'email' => 'fake@example.com',
            'password' => 'wrong',
        ]);
    }

    public function test_login_endpoint_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
