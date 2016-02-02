<?php namespace App\L5Admin\repositories\roles;

use App\Models\Role;

class RoleRepository implements RoleInterface {
	public function store($name){

		// create new instance
		$role = new Role();
		$role->name = $name;
		// persist
		$role->save();

		return $role;
	}

	public function getAllRoles(){
		return Role::all();
	}

	public function getAllRolesList(){
		return Role::lists('name', 'id');
	}

	public function getRoleAndPermissions($role_id){
		return Role::with('permissions')->where('id', $role_id)->first();
	}

	private function groupPermissionByResource($permissions){
		$data = array();
		
		foreach($permissions as $permission){
			$data[$permission->resource][] = $permission;
		}

		return $data;
	}

	public function update($role_id, $name){
		$role = Role::find($role_id);
		$role->name = $name;
		$role->save();
		return $role;
	}

	public function delete($role_id){
		Role::where('id', $role_id)->delete();
	}
}