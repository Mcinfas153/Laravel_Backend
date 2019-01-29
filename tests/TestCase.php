<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /* runs before each test */
    protected function setUp()
    {
        parent::setUp();

        // clear database

        DB::statement('TRUNCATE TABLE `movies`');
        DB::statement('TRUNCATE TABLE `tags`');
        DB::statement('TRUNCATE TABLE `users`');

    }
    /**
     * @param null $user
     * @return array
     *
     * * * * * * * *   create a Test Token for User - Authetication  * * *  * * * * * * * *
     */
    protected function getAccessToken($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {

            $token = $user->createToken('MyApp')->accessToken;

            $headers['Authorization'] = 'Bearer '.$token;
        }
        return $headers;
    }
}
