<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	/*Errors*/
	Route::group(array('prefix'=>'errors'), function(){
		Route::get('/401', array(
			'as'=>'admin.errors.401',
			'middleware'=>'auth',
			function(){
				return view('errors.401');
			}
		));
	});


	/*Permissions*/
	Route::group(array('prefix'=>'admin/permissions'), function(){
	
		Route::get('/', array(
			'as'=>'admin.permission.index',
			'uses'=>'PermissionsController@index',
			'middleware'=>'acl:readPermission'
		));

		Route::get('{resource}/edit', array(
			'as'=>'admin.permission.edit',
			'uses'=>'PermissionsController@edit',
			'middleware'=>'acl:updatePermission'
		));

		Route::post('{resource}/update', array(
			'as'=>'admin.permission.update',
			'uses'=>'PermissionsController@update',
			'middleware'=>'acl:updatePermission'
		));

		Route::get('/create', array(
			'as'=>'admin.permission.create',
			'uses'=>'PermissionsController@create',
			'middleware'=>'acl:createPermission'
		));

		Route::post('/store', array(
			'as'=>'admin.permission.store',
			'uses'=>'PermissionsController@store',
			'middleware'=>'acl:createPermission'
		));

		Route::get('{resource}/delete', array(
			'as'=>'admin.permission.delete',
			'uses'=>'PermissionsController@delete',
			'middleware'=>'acl:deletePermission'
		));

	});

	/*Roles*/
	Route::group(array('prefix'=>'admin/roles'), function(){
		
		Route::get('/', array(
			'as'=>'admin.roles.index',
			'uses'=>'RolesController@index',
			'middleware'=>'acl:readRole'
		));

		Route::get('/create', array(
			'as'=>'admin.roles.create',
			'uses'=>'RolesController@create',
			'middleware'=>'acl:createRole'
		));

		Route::post('/store', array(
			'as'=>'admin.roles.store',
			'uses'=>'RolesController@store',
			'middleware'=>'acl:createRole'
		));

		Route::get('{role_id}/edit', array(
			'as'=>'admin.roles.edit',
			'uses'=>'RolesController@edit',
			'middleware'=>'acl:updateRole'
		));

		Route::post('{role_id}/update', array(
			'as'=>'admin.roles.update',
			'uses'=>'RolesController@update',
			'middleware'=>'acl:updateRole'
		));


		Route::get('{role_id}/delete', array(
			'as'=>'admin.roles.delete',
			'uses'=>'RolesController@delete',
			'middleware'=>'acl:deleteRole'
		));
	});

	/*Users*/
	Route::group(array('prefix'=>'admin/users'), function(){
		Route::get('/', array(
			'as'=>'admin.users.index',
			'uses'=>'UsersController@index',
			'middleware'=>'acl:readUser'
		));

		Route::get('/create', array(
			'as'=>'admin.users.create',
			'uses'=>'UsersController@create',
			'middleware'=>'acl:createUser'
		));

		Route::post('/store', array(
			'as'=>'admin.users.store',
			'uses'=>'UsersController@store',
			'middleware'=>'acl:createUser'
		));

		Route::get('{user_id}/edit', array(
			'as'=>'admin.users.edit',
			'uses'=>'UsersController@edit',
			'middleware'=>'acl:updateUser'
		));

		Route::post('{user_id}/update', array(
			'as'=>'admin.users.update',
			'uses'=>'UsersController@update',
			'middleware'=>'acl:updateUser'
		));

		Route::get('{user_id}/delete', array(
			'as'=>'admin.users.delete',
			'uses'=>'UsersController@delete',
			'middleware'=>'acl:deleteUser'
		));
	});

	/*Config*/
	Route::group(array('prefix'=>'config'), function(){
		Route::get('/', array(
			'as'=>'admin.config.index',
			'uses'=>'UserConfigController@index'			
		));

		Route::post('/password', array(
			'as'=>'admin.config.update.password',
			'uses'=>'UserConfigController@updatePassword'
		));
	});

	/*Authentication*/
	Route::group(array('prefix'=>'auth'), function(){
		Route::get('/login', array(
			'as'=>'admin.auth.login',
			'uses'=>'Authentication\AuthController@login'
		));

		Route::get('/logout', array(
			'as'=>'admin.auth.logout',
			'uses'=>'Authentication\AuthController@logout'
		));

		Route::post('/login', array(
			'as'=>'admin.auth.authenticate',
			'uses'=>'Authentication\AuthController@authenticate'
		));
	});

	/*Static*/
	Route::get('/', array(
		'as'=>'home',
		'uses'=>'DashboardController@index'
	));
});
