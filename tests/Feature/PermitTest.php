<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $responseSingle = $this->get('/api/permits/1');
        $responseIndex = $this->get('/api/permits');

        $data = [
            "user_id" => 1,
            "file" => "YouTube",
            "description" => "2014",
            "dates" => ['2022-03-01', '2022-02-01']
        ];
        
        $responsePost = $this->post('/api/permits', $data);

        $responsePost->assertStatus(200);
        $responseSingle->assertStatus(200);
        $responseIndex->assertStatus(200);
    }
}
