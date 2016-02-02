

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
                
                <li><a href="{{route('admin.permission.index')}}">Permissions</a></li>
                <li class="active">Edit Permission</li>
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  

                    @include('layouts.main.partial.flash')                 

                    <div class="page-header">
                        <h1>Permission
                            <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                                Edit permission
                            </small>
                        </h1>
                    </div>

                            
                    {{Form::open(array(
                        'route'=> array('admin.permission.update', $resource),
                        'class'=>'form-horizontal',
                        'role'=>'form'
                    ))}}

                    <div class="form-group {{ $errors->has('resource') ? 'has-error' : '' }}">                            
                        {{ Form::label('resource', 'Resource', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">                                
                            {{ Form::text('resource', old('resource') ?: $resource, ['id'=>'resource', 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'eg: PostModel (or anything; Forum, UserModel, etc)']) }} 
                            @if($errors->has('resource'))                               
                            <span class="help-block col-xs-12 col-sm-7">
                                <span class="middle">{{ $errors->first('resource') }}</span>
                            </span>
                            @endif
                        </div>

                    </div>
                    
                    <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">                            
                        {{ Form::label('label', 'Label', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        <div class="col-sm-9">                                
                            {{ Form::text('label', old('label') ?: $label, ['id'=>'label', 'class'=>'col-xs-10 col-sm-5', 'placeholder'=>'Label (eg: Post)']) }}
                            @if($errors->has('label'))                               
                            <span class="help-block col-xs-12 col-sm-7">
                                <span class="middle">{{ $errors->first('label') }}</span>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('actions') ? 'has-error' : '' }}">
                        <div class="control-group">

                            {{ Form::label('actions', 'Actions', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                            
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('actions[]', 'create', PermissionHelper::isActionSet($permission, 'create'), ["class"=>"ace ace-checkbox-2"]) }}
                                        <span class="lbl"> Create </span>
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('actions[]', 'read', PermissionHelper::isActionSet($permission, 'read'), ["class"=>"ace ace-checkbox-2"]) }}
                                        <span class="lbl"> Read </span>
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('actions[]', 'update', PermissionHelper::isActionSet($permission, 'update'), ["class"=>"ace ace-checkbox-2"]) }}
                                        <span class="lbl"> Update </span>
                                    </label>
                                </div>


                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('actions[]', 'delete', PermissionHelper::isActionSet($permission, 'delete'), ["class"=>"ace ace-checkbox-2"]) }}
                                        <span class="lbl"> Delete </span>
                                    </label>
                                </div>

                                @if($errors->has('actions'))                               
                                <span class="help-block col-xs-12 col-sm-7">
                                    <span class="middle">{{ $errors->first('actions') }}</span>
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

                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
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