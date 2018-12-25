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

}
