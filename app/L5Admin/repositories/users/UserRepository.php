<?php namespace App\L5Admin\repositories\users;

use App\Models\User;
use Hash;

class UserRepository implements UserInterface {
	public function create($data){
		
		// create the user
		$user = new User();
		$user->full_name = $data['name'];
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
		$user->is_super = isset($data['issuper']) ? 1 : 0;
		$user->save();

		return $user;
	}

	public function update($user_id, $data){
		$user = User::find($user_id);
		$user->full_name = $data['name'];
		$user->is_super = isset($data['issuper']) ? 1 : 0;
		$user->save();
		return $user;
	}

	public function getUsersPaginated(){
		return User::paginate(10);
	}

	public function getUserWithRoles($user_id){
		return User::with('roles')->where('id', $user_id)->first();
	}

	public function removeUser($user_id){
		User::where('id', $user_id)->delete();
	}

	public function updatePassword($password){
		$user = auth()->user();
		$user->password = Hash::make($password);
		$user->save();
	}
}