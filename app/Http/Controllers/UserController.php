<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, User $user )
    {
        $user = $user->newQuery();

        if ($request->has('name')) {
            $user->where('name', 'like', $request->input('name').'%');
        }

        if ($request->has('firstName')) {
            $user->where('firstName', 'like', $request->input('firstName').'%');
        }

        if ($request->has('lastName')) {
            $user->where('lastName', 'like', $request->input('lastName').'%');
        }

        if ($request->has('city')) {
            $user->where('city', 'like', $request->input('city').'%');
        }

        return $user->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $user = User::create($request->all());

        return response()->json([
            "users" => $user
        ],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $users = User::find($id);

        return response()->json([
            "users" => $users
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $user = User::find($id)->update($request->all());

        return response()->json([
            "users" => $user
        ],  201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $user = User::find($id);
        if (!$user) {

            return $this->response->errorNotFound('contact Not Found');
        }

        if($user->delete()) {

            return response()->json(null, 204);

        } else {

            return response()->json('Could not delete a contact');
        }
    }


    /**
     *  SEARCH LIKE name %
     */
    public function searchname($name): JsonResponse
    {
        $users = DB::table('users')
            ->where('name', 'like', $name.'%')
            ->get();

        return response()->json([
            "usersss" => $users
        ], 200);
    }
}
