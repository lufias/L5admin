<?php namespace App\L5Admin\repositories\roles;

interface RoleInterface {
	public function store($name);
	public function getAllRoles();	
	public function getAllRolesList();	
	public function getRoleAndPermissions($role_id);
	public function update($role_id, $name);
	public function delete($role_id);
}