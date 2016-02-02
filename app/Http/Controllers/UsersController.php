<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\L5Admin\repositories\roles\RoleInterface;
use App\L5Admin\repositories\users\UserInterface;

class UsersController extends Controller
{

    protected $role;
    protected $user;

    public function __construct(RoleInterface $role, UserInterface $user){
        
        $this->middleware('auth');

        $this->role = $role;
        $this->user = $user;

    }

    public function index(){       
        
    	// we going to show list of users here
        // get all users paginated
        $users = $this->user->getUsersPaginated();

        return view('user.index')->with(compact('users'));
    	
    }

    public function create(){        

    	// this one need a form to create the user
    	// we also need list of roles to be assigned to this user
    	
    	// get the roles then
    	$roles = $this->role->getAllRolesList();        

        return view('user.create')->with(compact('roles'));
    }

    public function store(\App\Http\Requests\CreateUserRequest $request){
        // create the user
        $user = $this->user->create($request->all());

        // sync the roles if the user provided for one
        if($request->get('roles')){
            $user->roles()->sync($request->get('roles'));
        }
        else{
            $user->roles()->sync([]);   
        }
        
        // flash successfull message
        $request->session()->flash('success', 'Successfully create user');

        // return back to previous
        return back();

    }

    public function edit($user_id){
        // get the user eager loaded with roles
        $user = $this->user->getUserWithRoles($user_id);

        // grab the ids of roles out of the collection into an array
        $userSelectedRoleIds = $this->getRolesIds($user);

        // get all available roles
        $rolesList = $this->role->getAllRolesList();



        return view('user.edit')->with(compact('user', 'rolesList', 'userSelectedRoleIds'));        
    }

    public function update(\App\Http\Requests\UpdateUserRequest $request, $user_id){        
    
        // get user
        $user = $this->user->update($user_id, $request->all());
        
        // sync the roles if the user provided for one
        if($request->get('roles')){
            $user->roles()->sync($request->get('roles'));
        }
        else{
            $user->roles()->sync([]);   
        }

        // flash successfull message
        $request->session()->flash('success', 'Successfully update user');

        // return back to previous
        return back();


    }

    private function getRolesIds($user){
        $data = array();
        foreach($user->roles as $role){
            $data[] = $role->id;
        }
        return $data;
    }

    public function delete(Request $request, $user_id){
        $this->user->removeUser($user_id);

        // flash successfull message
        $request->session()->flash('success', 'Successfully remove user');

        // return back to previous
        return back();

    }
}
