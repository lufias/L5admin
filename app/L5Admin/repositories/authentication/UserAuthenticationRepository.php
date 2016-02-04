<?php namespace App\L5Admin\repositories\authentication;

use App\Models\User;
use Hash;

class UserAuthenticationRepository implements UserAuthenticationInterface {
	public function authenticate($email, $password){
		// check if this user even exist in the first place
		if(! $user = User::where('email', $email)->first()){
			throw new \L5Admin\Exceptions\ModelNotFoundException('User not found');
		}
		// check the password
		if (! Hash::check($password, $user->password)){
			throw new \L5Admin\Exceptions\PasswordCheckException('Password Invalid');
		}		

		// log the user in
		\Auth::login($user);		
	}
}
