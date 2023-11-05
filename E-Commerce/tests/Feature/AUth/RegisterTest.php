<?php

namespace Tests\Feature\AUth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;
    public function test_user_can_register(): void
    {
        $this->postJson(route('user.register'), [
            'name' => 'mohammed syed',
            'email' => 'mohammed0110@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ])->assertCreated();

        $this->assertDatabaseHas('users', ['name' => 'mohammed syed']);
    }

    //test if name is required
    //test if name is string
    //test if name is between 10 and 50 character
    //test if user email is required
    //test if user email is email
    //test if user email is unique
    //test if password is required
    //test if password is string
    //test if password is confirmed
    //test if password is between 8 and 255 character
}
