<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_login_form()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_registeration_form()
    {
        $response = $this->get('/registeration');

        $response->assertStatus(200);
    }

    public function test_register()
    {
        $user = [
            'name' => 'Test',
            'email' => 'test@mail.com',
            'phone' => '0123456789',
            'is_subscription' => 0,
            'password' => 'passwordtest',
          ];
      
          $response = $this->post('/registeration/create', $user);
      
          array_splice($user,4);
      
          $this->assertDatabaseHas('users', $user);

    }

    public function test_login_user()
    {

        $response = $this->post('/login', [
            'email' => 'free@gmail.com',
            'password' => '123123123',
        ]);

        $response->assertRedirect('/dashboard');
    }
} 
