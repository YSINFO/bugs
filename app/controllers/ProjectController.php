<?php

class ProjectController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
        View::share('name', Session::get('name'));
    }

    function createProject(){

        $userId = Session::get('userId');
        if(!isset($userId))
            return Redirect::to('/');

        return View::make('projects.create');
    }

    function saveProject(){

        $userId = Session::get('userId');
        if(!isset($userId))
            return "not logged";

        $name = Input::get('name');
        $project = Project::where('name', '=', $name)->where('status', '=', 'active')->first();

        if(isset($project))
            return "duplicate";
        else {
            $project = new Project();

            $project->name = $name;
            $project->description = Input::get('description');
            $project->status = 'active';
            $project->created_by = 1;  //Session::get('userId');

            $project->save();

            echo 'done';
        }
    }

    function editProject($id){

        $userId = Session::get('userId');
        if(!isset($userId))
            return Redirect::to('/');

        $project = Project::find($id);

        return View::make('projects.edit')->with('project', $project);
    }

    function updateProject(){

        $userId = Session::get('userId');
        if(!isset($userId))
            return "not logged";

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

        $userId = Session::get('userId');
        if(!isset($userId))
            return Redirect::to('/');

        $projects = Project::all();

        return View::make('projects.list')->with('projects', $projects);
    }

    /***************** json methods *****************/
    function dataListProjects(){

        $userId = Session::get('userId');
        if(!isset($userId))
            return json_encode(array('message' => 'not logged'));

        $projects = Project::all();

        if($projects && count($projects)>0)
            return json_encode(array('found' => true, 'projects' => $projects->toArray(), 'message' => 'logged'));
        else
            return json_encode(array('found' => false, 'message' => 'logged'));
    }

}