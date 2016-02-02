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
                
                <li><a href="{{route('admin.users.index')}}">Users</a></li>
                <li class="active">Edit User</li>
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  

                    @include('layouts.main.partial.flash')                 

                    <div class="page-header">
                        <h1>User
                            <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                                Edit user
                            </small>
                        </h1>

                    </div>

                            
                    {{Form::open(array(
                        'route'=>array('admin.users.update', 'user_id'=>$user->id),
                        'class'=>'form-horizontal',
                        'role'=>'form'
                    ))}}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">                            
                        {{ Form::label('name', 'Full Name', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">                                
                            {{ Form::text('name', $user->full_name, ['id'=>'name', 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Full Name']) }} 
                            @if($errors->has('name'))                               
                            <span class="help-block col-xs-12 col-sm-7">
                                <span class="middle">{{ $errors->first('name') }}</span>
                            </span>
                            @endif
                        </div>

                    </div>                                     
                   
                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">                            
                        {{ Form::label('roles', 'Roles', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">                                
                            
                            {{

                                Form::select('roles[]', $rolesList, $userSelectedRoleIds, array('class' => 'select-multi col-xs-10 col-sm-5', 'multiple'=>true))

                            }}
                            
                            @if($errors->has('roles'))                               
                            <span class="help-block col-xs-12 col-sm-7">
                                <span class="middle">{{ $errors->first('roles') }}</span>
                            </span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group {{ $errors->has('issuper') ? 'has-error' : '' }}">
                        <div class="control-group">

                            {{ Form::label('issuper', 'Is Super', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                            
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>                                        
                                        {{ Form::checkbox('issuper', 1, $user->is_super == 1, ["class"=>"ace ace-checkbox-2"]) }}
                                        <span class="lbl"> Yes </span>
                                    </label>
                                </div>
                               
                                @if($errors->has('issuper'))                               
                                <span class="help-block col-xs-12 col-sm-7">
                                    <span class="middle">{{ $errors->first('issuper') }}</span>
                                </span>
                                @endif

                            </div>
                            

                        </div>

                    </div>                     
                                

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