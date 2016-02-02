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
                
                <li class="active">Users</li>                
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  

                   @include('layouts.main.partial.flash')                

                    <div class="page-header">
                        <h1>Users</h1>
                    </div>

                            
                    <a href="{{route('admin.users.create')}}">
						<button class="btn btn-primary add-new-btn">Add New</button>											
					</a>

					<div class="space-10"></div>

                    <table id="simple-table" class="table table-striped table-bordered table-hover">
                    	<thead>
                    		<tr>                    		
                    			<th>Users</th>                    			
                    			<th>Role(s)</th>
                    			<th></th>
                    		</tr>
                    	</thead>

						<tbody>
						
							@if(count($users))
							@foreach($users as $user)
							<tr>
								<td>{{ $user->full_name }}</td>
								<td>
									@foreach($user->roles as $role)
										<span class="label label-info arrowed-in arrowed-in-right">{{$role->name}}</span>										
									@endforeach
								</td>
								
								
								<td class="center">
									<div class="hidden-sm hidden-xs btn-group">
										
										<a href="{{route('admin.users.edit', ['user_id'=>$user->id])}}">
											<button class="btn btn-xs btn-info">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
										</a>
										<a href="{{ route('admin.users.delete', ['user_id'=>$user->id]) }}" class="delete">
											<button class="btn btn-xs btn-danger">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>	
										</a>									
										
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-position="auto" data-toggle="dropdown">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">												
												<li>
													<a class="tooltip-success" title="" data-rel="tooltip" href="{{route('admin.users.edit', ['user_id'=>$user->id])}}" data-original-title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>
												<li>
													<a class="tooltip-error delete" title="" data-rel="tooltip" href="{{ route('admin.users.delete', ['user_id'=>$user->id]) }}" data-original-title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
								
							</tr>
							@endforeach
							@else
							<tr><td colspan="2" class="center">No Record Found</td></tr>
							@endif																
						</tbody>

                    </table>   

                    {!! $users->render() !!}               

                    
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->

@stop