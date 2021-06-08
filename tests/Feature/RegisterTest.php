<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_register_page()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_register_user_create_db_entry()
    {
        $this->withoutExceptionHandling();
        $data = [
            'name' => 'Greg',
            'email' => 'testemail@test.com',
            'phone' => '+79998887766',
            'password' => 'password1',
            'password_confirmation' => 'password1'
        ];
        $response = $this->post('/register', $data);
        $response
            ->assertRedirect('/');
        $this->assertCount(1, User::all());
        $user = User::first();
        $this->assertEquals($data['name'], $user->name);
    }

    //TODO: null, создание записи в бд, регистрация по той же почте, номеру,

//    public function test
}
