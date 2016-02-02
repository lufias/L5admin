@extends('layouts.main.index')

@section('content')

<div class="main-content">
    <div class="main-content-inner">
        
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="/">Home</a>
                </li>
                
                <li><a href="{{route('admin.roles.index')}}">Roles</a></li>
                <li class="active">Edit Role</li>
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  

                   @include('layouts.main.partial.flash')                

                    <div class="page-header">
                        <h1>Roles
                            <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                                Edit role
                            </small>
                        </h1>

                    </div>

                            
                    {{Form::open(array(
                        'route'=>array('admin.roles.update', $role->id),
                        'class'=>'form-horizontal',
                        'role'=>'form'
                    ))}}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">                            
                        {{ Form::label('name', 'Name', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">                                
                            {{ Form::text('name', old('name') ?: $role->name, ['id'=>'name', 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'eg: Administrator']) }} 
                            @if($errors->has('name'))                               
                            <span class="help-block col-xs-12 col-sm-7">
                                <span class="middle">{{ $errors->first('name') }}</span>
                            </span>
                            @endif
                        </div>

                    </div>
                                                					

                    <div class="space-24"></div>

                    <h3 class="header smaller lighter blue">
                    	Permissions
                    	<small>Assign permissions to role</small>
                    </h3>


                    <table id="simple-table" class="table table-striped table-bordered table-hover">
                    	<thead>
                    		<tr>                    		
                    			<th>Permission</th>
                    			<th>Create</th>
                    			<th>Read</th>
                    			<th>Update</th>
                    			<th>Delete</th>                    			
                    		</tr>
                    	</thead>

						<tbody>

							
							@foreach($permissions as $resource=>$permission)
							<tr>
								<td>{{ $resource }}</td>

								<td class="center">
									@if(PermissionHelper::isActionSet($permission, 'create'))
										{{ Form::checkbox('actions['.$resource.'][]', 'create', PermissionHelper::isCheck($role->permissions, $resource, 'create')) }}						
									@endif		
								</td>						
								<td class="center">
									@if(PermissionHelper::isActionSet($permission, 'read'))
										{{ Form::checkbox('actions['.$resource.'][]', 'read', PermissionHelper::isCheck($role->permissions, $resource, 'read')) }}
									@endif		
								</td>
								<td class="center">
									@if(PermissionHelper::isActionSet($permission, 'update'))
										{{ Form::checkbox('actions['.$resource.'][]', 'update', PermissionHelper::isCheck($role->permissions, $resource, 'update')) }}
									@endif		
								</td>
								<td class="center">
									@if(PermissionHelper::isActionSet($permission, 'delete'))
										{{ Form::checkbox('actions['.$resource.'][]', 'delete', PermissionHelper::isCheck($role->permissions, $resource, 'delete')) }}
									@endif		
								</td>						
							</tr>
							@endforeach
							
											
												
						</tbody>
					</table>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>                                                            

                        </div>
                    </div>                        



                    {{Form::close()}}                       

                    
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->

@stop