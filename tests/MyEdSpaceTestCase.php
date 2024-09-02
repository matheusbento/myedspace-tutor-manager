<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class MyEdSpaceTestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function createAdminUserAndLogin(): User
    {
        $user = $this->createAdminUser();
        $this->actingAs($user, 'web');

        return $user;
    }

    public function createAdminUser(): User
    {
        $user = User::factory()->create();

        return $user;
    }
}
