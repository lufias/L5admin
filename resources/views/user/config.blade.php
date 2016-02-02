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
                                
                <li class="active">Config</li>
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  

                    @include('layouts.main.partial.flash')                 

                    <div class="page-header">
                        <h1>User Configuration
                            <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                                Change password
                            </small>
                        </h1>

                    </div>

                            
                    {{Form::open(array(
                        'route'=>'admin.config.update.password',
                        'class'=>'form-horizontal',
                        'role'=>'form'
                    ))}}

                                    

                    <div class="clearfix form-actions">
                        <div class="col-md-9">

                        	<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">                            
                        	{{ Form::label('password', 'New Password', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        		<div class="col-sm-9">                                
                        			{{ Form::password('password', ['id'=>'password', 'class'=>'col-xs-10 col-sm-5']) }}
                        			@if($errors->has('password'))                               
                        			<span class="help-block col-xs-12 col-sm-7">
                        				<span class="middle">{{ $errors->first('password') }}</span>
                        			</span>
                        			@endif
                        		</div>
                        	</div> 

                        	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">                            
                        	{{ Form::label('password_confirmation', 'New Password', ['class'=>'col-sm-3 control-label no-padding-right']) }}
                        		<div class="col-sm-9">                                
                        			{{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'class'=>'col-xs-10 col-sm-5']) }}
                        			@if($errors->has('password_confirmation'))                               
                        			<span class="help-block col-xs-12 col-sm-7">
                        				<span class="middle">{{ $errors->first('password_confirmation') }}</span>
                        			</span>
                        			@endif
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