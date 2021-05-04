<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    public function testExample1()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     * we can omit the 'test' word in test functions
     */
    public function Example2()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
