<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post('/api/users', [
            'username' => 'bagus',
            'password' => 'password',
            'name' => 'Bagus Semesta'
        ])->assertStatus(201)
        ->assertJson([
            "data" => [
                'username' => 'bagus',
                'name' => 'Bagus Semesta'
            ]
        ]);
    }

    // public function testRegisterFailed()
    // {
        
    // }

    // public function testRegisterUsernameAlreadyExists()
    // {
        
    // }
}
