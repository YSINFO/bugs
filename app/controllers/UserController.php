<?php

class UserController extends BaseController {

    function __construct(){
        View::share('root', URL::to('/'));
        View::share('name', Session::get('name'));
    }

    function userSection(){

        $runningProjects = Project::where('status', '=', 'active')->count();
        $closedProjects = Project::where('status', '=', 'closed')->count();
        $currentBugs = Bug::where('status', '=', 'active')->count();
        $fixedBugs = Bug::where('status', '=', 'fixed')->count();
        $unresolvedBugs = Bug::where('status', '=', 'unresolved')->count();

        return View::make('users.user-section')
                ->with('runningProjects', $runningProjects)
                ->with('closedProjects', $closedProjects)
                ->with('currentBugs', $currentBugs)
                ->with('fixedBugs', $fixedBugs)
                ->with('unresolvedBugs', $unresolvedBugs);
    }

    function createUser(){
        return View::make('users.user-section');
    }

    function saveUser(){

        $email = Input::get('email');

        $user = User::where('email', '=', $email)->first();

        if(isset($user)){
            echo 'Duplicate email';
        }
        else{
            $user = new User();

            $user->email = $email;
            $user->name = Input::get('name');
            $user->password = Input::get('password');
            $user->user_type = Input::get('user_type');

            $user->save();

            echo 'done';
        }
    }

    function profile(){
        $userId = Session::get('userId');

        if(isset($userId)){
            $user = User::find($userId);

            if(isset($user)){

                return View::make('users.profile')->with('user', $user);
            }
            else
                return Redirect::to('/');
        }
        else
            return Redirect::to('/');
    }

    function updateProfile(){

        $userId = Session::get('userId');

        $user = User::find($userId);

        if(isset($user)){

            $email = Input::get('email');

            $userByEmail = User::where('email', '=', $email)->first();

            if(isset($userByEmail) && $userByEmail->id != $user->id)
                echo 'Email already taken';
            else{
                $user->id = $userId;
                $user->email = $email;
                $user->name = Input::get('name');
                $user->password = Input::get('password');
                $user->user_type = Input::get('user_type');

                $user->save();

                echo 'Profile updated successfully';
            }
        }
        else
            echo 'Invalid user';
    }

    function listUsers(){
        $users = User::all();

        return View::make('users.user-section')->with('users', $users);
    }


    /************** json methods ***************/

    function dataListUsers(){
        $users = User::all();

        return $users;
    }
}