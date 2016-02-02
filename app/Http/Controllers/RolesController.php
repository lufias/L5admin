<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\L5Admin\repositories\permissions\PermissionInterface;
use App\L5Admin\repositories\roles\RoleInterface;

class RolesController extends Controller
{

	protected $permission;
    protected $role;

	public function __construct(PermissionInterface $permission, RoleInterface $role){
		$this->middleware('auth');
		$this->permission = $permission;
        $this->role = $role;

	}

    public function index(){

        // get all roles
        
        $roles = $this->role->getAllRoles();

        return view('roles.index')->with(compact('roles'));
    }

    public function create(){

    	// we need all the permission to be elected during role creation
    	
    	$permissions = $this->permission->getAllPermission();  

    	return view('roles.create')->with(compact('permissions'));

    }

    public function store(\App\Http\Requests\CreateRoleRequest $request){        
        
        // create new record of role
        $role = $this->role->store($request->get('name'));

        // check if any permission is provided
        // if it is, get all this permission and attach to the newly created role
        if($request->get('actions')){
            // get all permission ids
            $permissions =  $this->getPermissionIds($this->permission->getPermissionByResourceAndAction($request->get('actions')));
            
            // sync this permission ids with the role
            $role->permissions()->sync($permissions);            
        }

        // flash successfull message
        $request->session()->flash('success', 'Successfully create role. You may add more if you wish.');

        // return back to previous
        return back();


    }

    private function getPermissionIds($permissions){
        $data = [];
        foreach($permissions as $permission){
            $data[] = $permission->id;
        }
        return $data;
    }   

    public function edit($role_id){

        // get respective role and eager load their permission

        $role = $this->role->getRoleAndPermissions($role_id);
        $permissions = $this->permission->getAllPermission(true); 


        return view('roles.edit')->with(compact('role', 'permissions'));

    } 

    public function update(\App\Http\Requests\UpdateRoleRequest $request, $role_id){
        
        // update the record
        $role = $this->role->update($role_id, $request->get('name'));

        // if actions is given, sync up the new one        
        if($request->get('actions')){
            // get all permission ids
            $permissions =  $this->getPermissionIds($this->permission->getPermissionByResourceAndAction($request->get('actions')));
            
            // sync this permission ids with the role
            $role->permissions()->sync($permissions);
        }

        // else, remove everything
        else{
            $role->permissions()->sync([]);
        }

        // flash successfull message
        $request->session()->flash('success', 'Successfully update role.');

        // return back to previous
        return back();
    }

    public function delete(Request $request, $role_id){
        $this->role->delete($role_id);

        // flash successfull message
        $request->session()->flash('success', 'Successfully deleted role.');

        // return back to previous
        return back();
    }

}
