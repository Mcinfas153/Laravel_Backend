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
