<?php

class BugController extends BaseController {

    function createBug(){
        return View::make('bugs.create');
    }

    function saveBug(){

        $bug = new Bug();

        $bug->title = Input::get('title');
        $bug->description = Input::get('description');
        $bug->created_by = Session::get('userId');
        $bug->project_id = Input::get('project_id');
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

        $bugs = Bug::where('project_id', '=', $projectId)->get();

        return View::make('bugs.list')->with('bugs', $bugs);
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

    /****************** json methods ***********************/

    function dataListBugs($projectId){

        $bugs = Bug::where('project_id', '=', $projectId)->get();

        return $bugs;
    }

    function dataListBugComments($bugId){

        $comments = BugComment::where('bug_id', '=', $bugId)->get();

        return $comments;
    }
}