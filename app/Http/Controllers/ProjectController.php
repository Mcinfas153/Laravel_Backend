<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, Project $project ): JsonResponse
    {
        if ($request->has('filter')) {

            if($request->filled('user_id')){
                $projects = $project->where('user_id',  $request->input("user_id"))->get();
            }

        }
        else {
            $projects = $project->get();
        }

        return response()->json([
            "projects" => $projects
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $project = Project::create($request->all());

        return response()->json([
            "projects" => $project
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {

        $data = Project::with([ 'user' ])->whereId($id)->first();

        return response()->json([
            "projects" => $data,
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
        $project = Project::find($id)->update($request->all());

        return response()->json([
            "projects" => $project
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $project = Project::find($id);
        if (!$project) {

            return $this->response->errorNotFound('project Not Found');
        }

        if($project->delete()) {

            return response()->json(null, 204);
        } else {

            return response()->json('Could not delete a project');
        }
    }
}
