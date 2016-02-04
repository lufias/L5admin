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
                <li class="active">Error 401</li>
            </ul><!-- /.breadcrumb -->

           
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->  
                   
						<div class="error-container">
							<div class="well">
								<h1 class="grey lighter smaller">
									<span class="blue bigger-125">
										<i class="ace-icon fa fa-random"></i>
										401
									</span>
									You Are Not Authorized To Procees
								</h1>

								<div class="space"></div>

								<div>
									<h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

									<ul class="list-unstyled spaced inline bigger-110 margin-15">
										<li>
											<i class="ace-icon fa fa-hand-o-right blue"></i>
											Read the faq
										</li>

										<li>
											<i class="ace-icon fa fa-hand-o-right blue"></i>
											Give us more info on how this specific error occurred!
										</li>
									</ul>
								</div>

								<hr />
								<div class="space"></div>

								<div class="center">
									<a href="javascript:history.back()" class="btn btn-grey">
										<i class="ace-icon fa fa-arrow-left"></i>
										Go Back
									</a>

									<a href="{{ route('home') }}" class="btn btn-primary">
										<i class="ace-icon fa fa-tachometer"></i>
										Dashboard
									</a>
								</div>
							</div>
						</div>                       
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->


@stop