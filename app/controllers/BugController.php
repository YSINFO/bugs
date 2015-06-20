<?php

class BugController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
    }

    function createBug(){

        $projectId = Session::get('currentProject');

        if(isset($projectId))
            return View::make('bugs.create')->with('projectId', $projectId);
        else
            return Redirect::to('/');
    }

    function saveBug(){

        $bug = new Bug();

        $bug->title = Input::get('title');
        $bug->description = Input::get('description');
        $bug->created_by = 1; //Session::get('userId');
        $bug->project_id = Session::get('currentProject');
        $bug->status = 'active';

        $bug->save();

        echo 'done';
    }

    function editBug($id){

        $bug = Bug::find($id);

        return View::make('bugs.edit')->with('bug', $bug);
    }

    function updateBug(){

        $id = Input::get('id');

        $bug = Bug::find($id);

        if($bug){

            $title = Input::get('title');
            $description = Input::get('description');
            $status = Input::get('status');

            if(isset($title))
                $bug->title = Input::get('title');

            if(isset($description))
                $bug->description = Input::get('description');

            if(isset($status))
                $bug->status = Input::get('status');

            $bug->save();

            echo 'done';
        }
        else
            echo 'invalid';
    }

    function listBugs($projectId){

        if(isset($projectId)){
            $bugs = Bug::where('project_id', '=', $projectId)->get();

            return View::make('bugs.list')->with('bugs', $bugs);
        }
        else
            return Redirect::to('/');
    }

    function addBugComment(){

        $bugComment = new BugComment();

        $bugComment->comment= Input::get('title');
        $bugComment->created_by = Session::get('userId');
        $bugComment->bug_id = Input::get('bug_id');
        $bugComment->status = 'active';

        $bugComment->save();

        echo 'done';
    }

    function listBugComments($bugId){

        if(isset($bugId)){
            Session::put('bugId', $bugId);

            $projectId = Session::get('currentProject');

            if(isset($projectId))
                return View::make('bugs.list-comments')->with('projectId', $projectId);
            else
                return Redirect::to('/');
        }
        else
            return Redirect::to('/');
    }

    /****************** json methods ***********************/

    function dataListBugs(){

        $projectId = Session::get('currentProject');

        if(isset($projectId)){
            $bugs = Bug::where('project_id', '=', $projectId)->get();

            if($bugs && count($bugs)>0)
                return json_encode(array('found' => true, 'bugs' => $bugs->toArray()));
            else
                return json_encode(array('found' => false));
        }
        else
            return json_encode(array('found' => false));
    }

    function dataListBugComments(){

        $bugId = Session::get('currentBug');

        if(isset($bugId)){
            $comments = Bug::where('bug_id', '=', $bugId)->get();

            if($comments && count($comments)>0)
                return json_encode(array('found' => true, 'comments' => $comments->toArray()));
            else
                return json_encode(array('found' => false));
        }
        else
            return json_encode(array('found' => false));
    }
}