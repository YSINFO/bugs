<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::post('/check-login', 'AuthenticationController@checkLogin');

Route::post('/user-section', 'UserController@userSection');
Route::post('/create-user', 'UserController@createUser');
Route::post('/save-user', 'UserController@saveUser');
Route::post('/is-duplicate-user', 'UserController@isDuplicateUser');
Route::post('/list-users', 'UserController@listUsers');

Route::post('/create-project', 'ProjectController@createProject');
Route::post('/save-project/{id}', 'ProjectController@saveProject');
Route::post('/edit-project/{id}', 'ProjectController@editProject');
Route::post('/update-project', 'ProjectController@updateProject');
Route::post('/list-projects', 'ProjectController@listProjects');

Route::post('/create-bug', 'ProjectController@createBug');
Route::post('/save-bug/{id}', 'ProjectController@saveBug');
Route::post('/edit-bug/{id}', 'ProjectController@editBug');
Route::post('/update-bug', 'ProjectController@updateBug');
Route::post('/list-bugs', 'ProjectController@listBugs');
Route::post('/add-bug-comment', 'ProjectController@addBugComment');

Route::post('/data-list-projects', 'ProjectController@dataListProjects');
Route::post('/data-list-bugs/{id}', 'BugController@dataListBugs');                  // id => project id
Route::post('/data-list-bug-comments/{id}', 'BugController@dataListBugComments');   // id => bug id
Route::post('/data-list-users', 'UserController@dataListUsers');
