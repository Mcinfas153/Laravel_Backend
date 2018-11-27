<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
