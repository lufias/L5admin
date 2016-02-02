<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>L5 Admin</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

         <!-- page specific plugin styles -->                
        <link rel="stylesheet" href="/css/dist/style.css">               

        <!-- Fort awesome -->
        <link rel="stylesheet" href="/libs/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/libs/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />



               
              

    </head>

    <body class="no-skin">
    
        @include('layouts.main.header')
        

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>

                @include('layouts.main.sidenav-shortcut')

                @include('layouts.main.sidenav')

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                </script>
            </div>

            @yield('content')

            @include('layouts.main.footer')

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->


        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/libs/assets/js/jquery.min.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/libs/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='/libs/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        
        <!-- page specific plugin scripts -->
                
        <script src="/libs/dist/libs.js"></script>
        <script src="/js/dist/app.js"></script>        

        <!-- inline scripts related to this page -->        
    </body>
</html>
