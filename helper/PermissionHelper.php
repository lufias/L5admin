<?php 

class PermissionHelper {
	
	public static function isActionSet($permission, $action){		
		foreach($permission as $p){
			if(isset($p->action) && $p->action == $action){
				return true;
			}
		}
		return false;
	}

	public static function isCheck($mySelectedPermissions, $resource, $action){
		
		foreach($mySelectedPermissions as $permission){
			if($permission->resource == $resource && $permission->action == $action){
				return true;
			}
		}

		return false;


	}

}
