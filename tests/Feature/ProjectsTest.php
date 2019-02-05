<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Project;

class ProjectsTest extends TestCase
{
    /**
     *  GET all projects
     */
    public function testProjectsTest()
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);

        $projects = factory(Project::class, 10)->create();

        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertJsonCount(10, 'projects');
        $response->assertJson([
            'projects' => $projects->map(function($project) {
                return [
                    'id' => $project->getKey(),
                    'number' => $project->number,
                    'name' => $project->name,
                    'manager' => $project->manager,
                ];
            })->toArray(),
        ]);
    }

    /**
     *   Delete a Project
     */
    public function testProjectDeleteTest(){

        $this->withoutMiddleware();

        $project = factory(Project::class)->create([]);
        $response = $this->delete('/projects/' . $project->id);

        $response->assertStatus(204);
    }
}
