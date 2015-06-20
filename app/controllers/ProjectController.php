<?php

class ProjectController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
    }

    function createProject(){

        return View::make('projects.create');
    }

    function saveProject(){

        $name = Input::get('name');
        $project = Project::where('name', '=', $name)->where('status', '=', 'active')->first();

        $project = new Project();

        $project->name = $name;
        $project->description = Input::get('description');
        $project->status = 'active';
        $project->created_by = 1;  //Session::get('userId');

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

    /***************** json methods *****************/
    function dataListProjects(){

        $projects = Project::all();

        if($projects && count($projects)>0)
            return json_encode(array('found' => true, 'projects' => $projects->toArray()));
        else
            return json_encode(array('found' => false));
    }

}