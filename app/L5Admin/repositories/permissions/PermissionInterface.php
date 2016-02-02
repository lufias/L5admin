<?php namespace App\L5Admin\repositories\permissions;

interface PermissionInterface {
	public function createPermission($data);
	public function getAllPermission($sortActions = false);
	public function getPermissionById($id);
	public function getPermissionsByResourceName($resourceName);
	public function getPermissionByResourceAndAction($resources);	
	public function update($permissions, $data);
	public function delete($resourceName);
	public function groupPermissionByResource($permissions);
}