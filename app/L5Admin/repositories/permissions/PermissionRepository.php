<?php namespace App\L5Admin\repositories\permissions;

use App\Models\Permission;

class PermissionRepository implements PermissionInterface {
	
	public function createPermission($data){
		
		foreach($data['actions'] as $action){
			$permission = new Permission();
			$permission->label = $data['label'];
			$permission->resource = $data['resource'];
			$permission->action = $action;
			$permission->save();
		}	
	}	

	public function getAllPermission($sortActions = false){
		$permissions = $this->groupPermissionByResource(Permission::all());

		if(! $sortActions){
			return $permissions;
		}

		return $this->sortActions($permissions);
	}

	private function sortActions($permissions){
        
        $data = array();

        foreach($permissions as $resource=>$permission){            

            $data[$resource][] = $this->getAction($permission, 'create');
            $data[$resource][] = $this->getAction($permission, 'read');
            $data[$resource][] = $this->getAction($permission, 'update');
            $data[$resource][] = $this->getAction($permission, 'delete');
        }

        return $data;

    }

    private function getAction($permission, $action){

        foreach($permission as $p){
            if($p->action == $action){
                return $p;
            }
        }

        return null;

    }

	public function groupPermissionByResource($permissions){
		$data = array();
		
		foreach($permissions as $permission){
			$data[$permission->resource][] = $permission;
		}

		return $data;
	}

	public function getPermissionById($id){
		return Permission::find($id);
	}

	public function getPermissionsByResourceName($resourceName){
		return Permission::where('resource', $resourceName)->get();
	}

	public function update($permissions, $data){

		$permissions_actions = array();

		foreach($permissions as $permission){
			$permissions_actions[] = $permission->action;
		}

		$toDelete = array_diff($permissions_actions, $data['actions']);
		$toAdds = array_diff($data['actions'], $permissions_actions);
		$toUpdates = array_intersect($permissions_actions, $data['actions']);

		// delete
		foreach($toDelete as $toDel){
			foreach($permissions as $permission){
				if($permission->action == $toDel){
					$permission->delete();
				}
			}
		}

		// add
		foreach($toAdds as $toAdd){
			$permission = new Permission;
			$permission->resource = $data['resource'];
			$permission->label = $data['label'];
			$permission->action = $toAdd;
			$permission->save();
		}

		// update
		foreach($toUpdates as $toUpdate){
			foreach($permissions as $permission){
				if($permission->action == $toUpdate){
					$permission->resource = $data['resource'];
					$permission->label = $data['label'];
					$permission->save();
				}
			}
		}
	}

	public function delete($resourceName){
		Permission::where('resource', $resourceName)->delete();
	}

	public function getPermissionByResourceAndAction($resources){
		
		// get 1st item to kick thing off
		// its ok since this going to end up as or
		foreach($resources as $resource=>$actions){
			foreach($actions as $action){				
				$permissions = Permission::Where(function($query) use ($resource, $action){
					$query->where('resource', $resource)->where('action', $action);					
				});
				break;
			}
			break;
		}		

		// continue chaining
		foreach($resources as $resource=>$actions){
			foreach($actions as $action){				
				$permissions->orWhere(function($query) use ($resource, $action){
					$query->where('resource', $resource)->where('action', $action);
				});
			}
		}

		return $permissions->get();
	}

}


