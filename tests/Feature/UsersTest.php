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
     *  GET all created users ***********************************
     */
    public function testUsersTest()
    {
        $users = factory(User::class, 10)->create();

        $response = $this->json('GET','/users');

        $response->assertStatus(200);
        $response->assertJsonCount(10, 'users');
        $response->assertJson([
            'users' => $users->map(function($user) {
                return [
                    'id' => $user->getKey(),
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                ];
            })->toArray(),
        ]);
    }

    /**
     *    POST  user without Header and Auth *****************
     */
    /*public function testPostUserTest()
    {
        $this->withoutMiddleware();

        $user = factory(User::class)->create();

        $response = $this->json('POST','/users', [

            'id' => $user->getKey(),
            'city'          => $user->city,
            'email'         => $user->email,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'mobil'         => $user->mobil,
            'password'      => $user->password,
            'street'        => $user->street,
            'zip_code'      => $user->zip_code,

        ]);

        $response->assertStatus(201);
    }*/
    public function testBasicExample()
    {
        $user = factory(User::class)->create();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/users', [
            'city'          => $user->city,
            'email'         => $user->email,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'mobil'         => $user->mobil,
            'password'      => $user->password,
            'street'        => $user->street,
            'zip_code'      => $user->zip_code,
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     *       DELETE a user by id
     */
    public function testDeleteUser(){

        $this->withoutMiddleware();

        $user = factory(User::class)->create([]);

        $response = $this->json('DELETE','/users/' . $user->id);

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

/*    public function testPostContactAuthTest()
    {
        $user = factory(User::class)->create();

        $response = $this->json('POST','/api/users', [
            'id' => (int) $user->id,
            'email'    => $user->email,
            'name'     => $user->name,
            'first_name'     => $user->first_name,
            'last_name'     => $user->last_name,
            'mobil'     => $user->mobil,
            'city'     => $user->city,
            'zip_code'     => $user->zip_code,
            'street'     => $user->street,
            'password'     => $user->password,

        ], $this->getAccessToken($user));

        $response->assertStatus(201);
    }*/

    /**
     * *********************************************
     *   Test POST Update user with Auth Token ************************************************************************
     */
 /*   public function testUpdateUserAuthTest()
    {
        $user = factory(User::class)->create();

        $anotherUser = factory(User::class)->make();

        $response = $this->json('PUT','/api/users/'.$user->id, [
            'id' => (int) $user->id,
            'email'         => $anotherUser->email,
            'name'          => $anotherUser->name,
            'first_name'    => $anotherUser->first_name,
            'last_name'     => $anotherUser->last_name,
            'mobil'         => $anotherUser->mobil,
            'city'          => $anotherUser->city,
            'zip_code'      => $anotherUser->zip_code,
            'street'        => $anotherUser->street,
        ], $this->getAccessToken($user));

        $response->assertStatus(201);
    }
*/

    /**
     *  *********************************************
     *       DELETE a user with Auth and Token ************************************************************************
     */
    public function testDeleteUserAuthTest(){

        $this->withoutMiddleware();                         // i dont know, why i need this ???

        $user = factory(User::class)->create();

        $response = $this->delete('/api/users/' . $user->id, $this->getAccessToken($user));

        //var_dump ($this->getAccessToken($user));

        $response->assertStatus(204);
    }
}
