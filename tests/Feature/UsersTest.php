<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseTransactions;

    protected $headers = [];
    protected $scopes = [];
    protected $user;

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

        $user = factory(User::class)->create([]);
        $response = $this->post('/users/' . $user->id);

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
     * ****************************************
     *   Test GET  user with Auth Token *******************************************************************************
     */
    public function testGetContactAuthTest(){

        $user = factory(User::class)->create();

        $response = $this->get('/api/users', $this->getAccessToken($user));

        $response->assertStatus(200);
    }

    /**
     * *****************************************************
     *     Test POST user with Header and Auth Token ******************************************************************
     */
/*
    public function testPostContactAuthTest()
    {
        $user = factory(User::class)->create();

        $anotherUser = factory(User::class)->make();

        $response = $this->post('/api/users', [
            'id' => (int) $anotherUser->id,
            'email'    => $anotherUser->email,
            'name'     => $anotherUser->name,
            'first_name'     => $anotherUser->name,
            'last_name'     => $anotherUser->name,
            'mobil'     => $anotherUser->name,
            'city'     => $anotherUser->name,
            'zip_code'     => $anotherUser->name,
            'street'     => $anotherUser->name,
            'fisat_level'     => $anotherUser->name,
            'password'     => $anotherUser->password

        ], $this->getAccessToken($user));

        $response->assertStatus(201);
    }
*/
    /**
     * *********************************************
     *   Test POST Update user with Auth Token ************************************************************************
     */
    public function testUpdateUserAuthTest()
    {
        $user = factory(User::class)->create();

        $anotherUser = factory(User::class)->make();

        $response = $this->post('/api/users/'.$user->id, [
            'id' => (int) $user->id,
            'email'    => $anotherUser->email,
            'name'     => $anotherUser->name,
            'first_name'     => $anotherUser->name,
            'last_name'     => $anotherUser->name,
            'mobil'     => $anotherUser->name,
            'city'     => $anotherUser->name,
            'zip_code'     => $anotherUser->name,
            'street'     => $anotherUser->name,
            'fisat_level'     => $anotherUser->name,
            'password'     => $anotherUser->password
        ], $this->getAccessToken($user));

        $response->assertStatus(201);

    }


    /**
     *  *********************************************
     *       DELETE a user with Auth and Token ************************************************************************
     */
    public function testEndpointContactsDeleteAuthTest(){

        $this->withoutMiddleware();                         // i dont know, why i need this ???

        $user = factory(User::class)->create();
        $response = $this->delete('/api/users/' . $user->id, $this->getAccessToken($user));

        //var_dump ($this->getAccessToken($user));

        $response->assertStatus(204);
    }
}
