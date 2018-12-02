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


    /**
     *  GET all users
     */
    public function testUsersAuthTest()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/api/users', $this->getAccessToken($user));

        $response->assertStatus(200);
    }

    /**
     *
     *     Test POST user with Header and Auth Token ******************************************************************
     */
    public function testPostContactAuthTest()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/api/users', [
            'email'    => 'user' . rand(0, 99999999) . '@gmail.com',
            'name'     => 'Billy ' . rand(0, 99999999) . ' Joel',
            'password'     => 'Billy ' . rand(0, 99999999) . ' Joel',

        ], $this->getAccessToken($user));

        $response->assertStatus(201);
    }

    public function testGetContactAuthTest(){
        $user = factory(User::class)->create();

        $response = $this->get('/api/users', $this->getAccessToken($user));

        $response->assertStatus(200);
    }
    /**
     *       DELETE a user with Auth and Token ***********************************
     */
    public function testEndpointContactsDeleteAuthTest(){

        $this->withoutMiddleware();

        $user = factory(User::class)->create([]);
        $response = $this->delete('/api/users/' . $user->id, $this->getAccessToken($user));

        //var_dump ($this->getAccessToken($user));

        $response->assertStatus(204);
    }
}
