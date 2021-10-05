<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $responseSingle = $this->get('/api/permits/1');
        $responseIndex = $this->get('/api/permits');
        
        $responseSingle->assertStatus(200);
        $responseIndex->assertStatus(200);
    }
}
