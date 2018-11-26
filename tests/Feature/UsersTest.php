<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *  GET all users
     */
    public function testUsersTest()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    /**
     *    POST  user without Header and Auth
     */
    public function testPostUserTest()
    {
        $this->withoutMiddleware();

        $response = $this->post('/users/', [
            'email'    => 'user' . rand(0, 99999999) . '@gmail.com',
            'name'     => 'Billy ' . rand(0, 99999999) . ' Joel',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);

        $response->assertStatus(201);

    }

    /**
     *       DELETE a user
     */
    public function testEndpointContactsDelete(){

        $this->withoutMiddleware();

        $user = factory(User::class)->create([]);
        $response = $this->delete('/users/' . $user->id);

        $response->assertStatus(204);
    }
}
