<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class MoviesTest extends TestCase
{
    /**
     *  GET all movies
     */
    public function testMoviesTest()
    {
        $response = $this->get('/movies');

        $response->assertStatus(200);
    }


}
