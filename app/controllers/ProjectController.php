<?php

class ProjectController extends BaseController {

    function createProject(){

        return View::make('projects.create');
    }

    function saveProject(){

        $project = new Project();

        $project->title = Input::get('title');

        $project->save();

        echo 'done';
    }

    function editProject($id){

        $project = Project::find($id);

        return View::make('projects.edit')->with('project', $project);
    }

    function updateProject(){

        $id = Input::get('id');

        $project = Project::find($id);

        if($project){

            $title = Input::get('title');
            $description = Input::get('description');
            $status = Input::get('status');

            if(isset($title))
                $project->title = Input::get('title');

            if(isset($description))
                $project->description = Input::get('description');

            if(isset($status))
                $project->status = Input::get('status');

            $project->save();

            echo 'done';
        }
        else
            echo 'invalid';
    }

    function listProjects(){

        $projects = Project::all();

        return View::make('projects.list')->with('projects', $projects);
    }
    
}