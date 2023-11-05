<?php

namespace Tests\Feature\AUth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SocialRegisterTest extends TestCase
{

    use RefreshDatabase;
    public function test_user_can_register_with_google(): void
    {
        $this->getJson(route('google.callback'))->assertOk();
    }

    //test mock the google service

}
