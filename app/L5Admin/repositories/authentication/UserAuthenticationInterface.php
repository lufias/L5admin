<?php namespace App\L5Admin\repositories\authentication;

interface UserAuthenticationInterface {
	
	public function authenticate($email, $password);
}