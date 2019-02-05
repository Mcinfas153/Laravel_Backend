<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;
use App\Project;


class UsersProjectsWorkingController extends Controller
{
    /**
     *      User to Project - - - need ( $project_id $user_id )
     */
    public function userToProject( $project_id, $user_id ){
        $project = Project::find($project_id);
        $project->users()->attach($user_id);
        return response(array(
            'error' => false,
            'message' =>'Put User to Project successfully',
        ),201);
    }

    /**
     *      Project to User - - - need ( $project_id   $user_id )
     */
    public function projectToUser( $project_id, $user_id ){
        $user = User::find($user_id);
        $user->projects()->attach($project_id);
        return response(array(
            'error' => false,
            'message' =>'Put Project to User successfully',
        ),201);
    }

    /**
     *     DELETE a User of a Project - - - need ( $project_id $user_id )
     */
    public function deleteUser( $project_id, $user_id ){
        $project = Project::find($project_id);
        $project->users()->detach($user_id);
        return response(array(
            'error' => false,
            'message' =>'User deleted from Project successfully',
        ),204);
    }
    /**
     *      DELETE a Project of a User - - - need ( $project_id $user_id )
     */
    public function deleteProject( $project_id, $user_id ){
        $user = User::find($user_id);
        $user->projects()->detach($project_id);
        return response(array(
            'error' => false,
            'message' =>'Project deleted from User successfully',
        ),204);
    }
}
