<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserStoreCheckTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('RoleAndPermissionSeeder');
        $this->seed('UserSeeder');
        $this->user = User::factory()->create();
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
