<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\L5Admin\repositories\permissions\PermissionInterface;

class PermissionsController extends Controller
{

	protected $permission;

	public function __construct(PermissionInterface $permission){
		$this->permission = $permission;
        $this->middleware('auth');
	}

    public function index(){
    	// we going to show list of permissions
    	// need to grab permissions
        $permissions = $this->permission->getAllPermission();        

        return view('permission.index')->with(compact('permissions'));        

    	
    }

    public function create(){
    	// show form to create permission
    	// return view();
        
		return view('permission.create');

    }

    public function store(\App\Http\Requests\CreatePermissionRequest $request){
        
        // create the permission
        $this->permission->createPermission($request->all());

        // flash successfull message
        $request->session()->flash('success', 'Successfully create permission. You may add more if you wish.');

        // return back to previous
        return back();

    }

    public function edit($resource){
        // get the respected permission
        $permission = $this->permission->getPermissionsByResourceName($resource);
        
        $label = $this->getLabelOutOfPermission($permission);    

        return view('permission.edit')->with(compact('resource', 'label', 'permission'));
    }

    public function update(\App\Http\Requests\UpdatePermissionRequest $request,  $resource){
        
        // get respective resource
        $permissions = $this->permission->getPermissionsByResourceName($resource);

        // update
        $this->permission->update($permissions, $request->all());

        // flash successfull message
        $request->session()->flash('success', 'Successfully update permission.');

        // redirect upon success
        return redirect()->route('admin.permission.edit', ['resource'=>$resource]);
    }

    public function delete(Request $request, $resource){
        $this->permission->delete($resource);

        // flash successfull message
        $request->session()->flash('success', 'Successfully deleted permission.');

        // return back to previous
        return back();
        
    }

    private function getLabelOutOfPermission($permission){
        $label = null;
        foreach($permission as $p){
            $label = $p->label;
            break;
        }
        return $label;
    }
}
