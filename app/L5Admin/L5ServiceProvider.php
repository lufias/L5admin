<?php namespace App\L5Admin;

use Illuminate\Support\ServiceProvider;

class L5ServiceProvider extends ServiceProvider {
	public function register(){
		$this->app->bind('App\L5Admin\repositories\permissions\PermissionInterface', 'App\L5Admin\repositories\permissions\PermissionRepository');
		$this->app->bind('App\L5Admin\repositories\authentication\UserAuthenticationInterface', 'App\L5Admin\repositories\authentication\UserAuthenticationRepository');
		$this->app->bind('App\L5Admin\repositories\roles\RoleInterface', 'App\L5Admin\repositories\roles\RoleRepository');
		$this->app->bind('App\L5Admin\repositories\users\UserInterface', 'App\L5Admin\repositories\users\UserRepository');
	}
}