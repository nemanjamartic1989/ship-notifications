<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    /**
     * 
     *
     * TODO: Unit test will be written after complete Notifications module.
     */
    public function test_example()
    {
        $response = $this->get('/notifications');

        $response->assertStatus(200);
    }
}
