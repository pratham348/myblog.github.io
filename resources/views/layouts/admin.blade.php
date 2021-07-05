
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog Admin | </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
     
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Blog </b>Admin</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <a href="{{url('change')}}">
                <button class="btn btn-primary">Change Password</button>
              </a>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="{{url('dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            
            <li class="treeview">
              <a href="{{url('category')}}">
                <i class="fa fa-edit"></i> <span>Add Category</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('viewCategory')}}">
                <i class="fa fa-table"></i> <span>View Category</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('add')}}">
                <i class="fa fa-edit"></i> <span>Add Blog</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('viewblog')}}">
                <i class="fa fa-table"></i> <span>View Blog</span>
              </a>
            </li>
            
            <li>
              <a href="{{url('sendNotification')}}">
                <i class="fa fa-envelope"></i> <span>Send Notifications</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('viewSubscriber')}}">
                <i class="fa fa-table"></i> <span>View Subscribers</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('viewFeedback')}}">
                <i class="fa fa-table"></i> <span>View Feedback</span>
              </a>
            </li>
            
            <li>
              <a href="{{url('logout')}}">
                <i class="fa fa-sign-out"></i> <span>log Out</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
         @yield('content')
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy;2020-2021 <a href="#">The Blog Creator Company</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}" type="text/javascript"></script>
    

    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- Page Script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <!-- DATA TABES SCRIPT -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
  </body>
</html>