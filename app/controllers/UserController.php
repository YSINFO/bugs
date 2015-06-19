<?php

class UserController extends BaseController {

    function userSection(){
        return View::make('users.user-section');
    }

    function createUser(){
        return View::make('users.user-section');
    }

    function saveUser(){

        $user = new User();

        $user->email = Input::get('email');
        $user->name = Input::get('name');
        $user->password = Input::get('password');
        $user->user_type = Input::get('user_type');

        $user->save();

        echo 'done';
    }

    function isDuplicateUser(){
        $email = Input::get('email');

        $user = User::find('email', '=', $email)->first();

        return $user ? 'yes' : 'no';
    }

    function listUsers(){
        $users = User::all();

        return View::make('users.user-section')->with('users', $users);
    }

    function dataListUsers(){
        $users = User::all();

        return $users;
    }
}