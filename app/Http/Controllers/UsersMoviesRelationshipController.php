<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;
use App\Movie;


class UsersMoviesRelationshipController extends Controller
{
    /**
     *      User to Movie - - - need ( $movie_id $user_id )
     */
    public function userToMovie( $movie_id, $user_id ){
        $movie = Movie::find($movie_id);
        $movie->users()->attach($user_id);
        return response(array(
            'error' => false,
            'message' =>'Put User to Movie successfully',
        ),201);
    }

    /**
     *      Movie to User - - - need ( $movie_id   $user_id )
     */
    public function movieToUser( $movie_id, $user_id ){
        $user = User::find($user_id);
        $user->movies()->attach($movie_id);
        return response(array(
            'error' => false,
            'message' =>'Put Movie to User successfully',
        ),201);
    }

    /**
     *     DELETE a User of a Movie - - - need ( $movie_id $user_id )
     */
    public function deleteUser( $movie_id, $user_id ){
        $movie = Movie::find($movie_id);
        $movie->users()->detach($user_id);
        return response(array(
            'error' => false,
            'message' =>'User deleted from Movie successfully',
        ),204);
    }
    /**
     *      DELETE a Movie of a User - - - need ( $movie_id $user_id )
     */
    public function deleteCompany( $movie_id, $user_id ){
        $user = User::find($user_id);
        $user->movies()->detach($movie_id);
        return response(array(
            'error' => false,
            'message' =>'Movie deleted from User successfully',
        ),204);
    }
}
