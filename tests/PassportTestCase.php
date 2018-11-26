<?php

use App\User;
use Laravel\Passport\ClientRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PassportTestCase extends TestCase
{
    use DatabaseTransactions;

    protected $headers = [];
    protected $scopes = [];
    protected $user;

    public function setUp()
    {
        parent::setUp();
        // Important code goes here.
    }

    /**
     * Test POST contact with Header and Auth Token
     */
    public function testPostContactAuthTest()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/api/users', [
            'email'    => 'user' . rand(0, 99999999) . '@gmail.com',
            'name'     => 'Billy ' . rand(0, 99999999) . ' Joel',
            'password'     => 'Billy ' . rand(0, 99999999) . ' Joel',
        ], $this->headers($user));

        $response->assertStatus(201);
    }
}