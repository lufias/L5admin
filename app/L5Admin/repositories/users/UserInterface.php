<?php namespace App\L5Admin\repositories\users;

interface UserInterface {
	public function create($data);
	public function update($user_id, $data);
	public function getUsersPaginated();
	public function getUserWithRoles($user_id);
	public function removeUser($user_id);
	public function updatePassword($password);
}