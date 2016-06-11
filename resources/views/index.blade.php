<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Rescuer | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <style>
            #mapvictim {
                width: 530px;
                height: 250px;
            }
        </style>
        
        <style>
            #mapwarnings {
                width: 530px;
                height: 250px;
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>RSR</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Rescuer</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success" id="forum_count_min"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header" id="forum_count"></li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu" id="forum_notification">
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="/forum">See All Questions</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">3</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header" id="count_notification_mini">You have following notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu" id="notifitaions">

                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">
                                        @if(Auth::check())
                                        {{Auth::user()->username}}
                                        @endif
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                                        <p>
                                            @if(Auth::check())
                                            {{Auth::user()->username}}
                                            @endif
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div align="center">
                                            <a href="/users/signout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>@if(Auth::check())
                                {{Auth::user()->username}}
                                @endif</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-warning"></i> <span>Warnings</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/addwarnings"><i class="fa fa-circle-o"></i> New Warning</a></li>
                                <li><a href="/viewwarnings"><i class="fa fa-circle-o"></i> View All Warnings</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/forum">
                                <i class="fa fa-comment"></i> <span>Forum</span>
                            </a>
                        </li>         
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>News</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/addnews"><i class="fa fa-circle-o"></i> Add News</a></li>
                                <li><a href="/news"><i class="fa fa-circle-o"></i> View News</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-hospital-o"></i>
                                <span>Rescue Centers</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/addrescuecenters"><i class="fa fa-circle-o"></i> Add Rescue Centers</a></li>
                                <li><a href="/rescuecenter"><i class="fa fa-circle-o"></i> View Rescue Centers</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-home"></i>
                                <span>Relief Centers</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/addreliefcenter"><i class="fa fa-circle-o"></i> Add Relief Centers</a></li>
                                <li><a href="/reliefcenter"><i class="fa fa-circle-o"></i> View Relief Centers</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="/prewarnings">
                                <i class="fa fa-warning"></i> <span>Weather Warnings</span>
                            </a>
                        </li>
                        <li>
                            <a href="/victims">
                                <i class="fa fa-users"></i> <span>View Victims</span>
                            </a>
                        </li>
                        @if(Auth::user()->username=="admin")
                        <li>
                            <a href="/viewallusers">
                                <i class="fa fa-user"></i> <span>View Users</span>
                            </a>
                        </li>
                        @endif

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="ion ion-ios-people"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Victims</span>
                                    <span class="info-box-number" id="victim_count"></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 10%"></div>
                                    </div>
                                    <span class="progress-description">
                                        50% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="ion ion-document-text"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Unread Questions</span>
                                    <span class="info-box-number" id="forum_count_span"></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 9%"></div>
                                    </div>
                                    <span class="progress-description">
                                        20% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div><!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="ion ion-ios-analytics"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Warnings</span>
                                    <span class="info-box-number" id="warnings_count"></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="ion-ios-home"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Relief Centers</span>
                                    <span class="info-box-number" id="relief_count"></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                    <span class="progress-description">
                                        40% Increase in 30 Days
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <div class="box box-info">
                                <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=6.918736&lon=79.861274&name=Colombo"> </iframe>
                            </div>                           

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">

                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Victim Map</h4>
                                </div><!-- /.box-header -->
                                <div id="mapvictim">

                                </div>
                            </div>

                        </section><!-- right col -->

                        <section class="col-lg-6 connectedSortable">

                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Warnings Map</h4>
                                </div><!-- /.box-header -->
                                <div id="mapwarnings">

                                </div>
                            </div>

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Some information about this general settings option
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Other sets of options are available
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div><!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
$.widget.bridge('uibutton', $.ui.button);</script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <script>
jQuery.ajax({
    type: "GET",
    url: 'http://localhost/notificationusers',
    dataType: 'json',
    success: function (obj, textstatus) {
        $('#notifitaions').append('<li>' +
                '<a href="/viewallusers">' +
                '<i class="fa fa-users text-aqua"></i>' + obj + " user signup requests" +
                '</a>' +
                '</li>')
    }
});</script>

        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://localhost/victimscount',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#victim_count').text(obj)
                }
            })
                    ;</script>

        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://localhost/notificationvictims',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#notifitaions').append('<li>' +
                            '<a href="/victims">' +
                            '<i class="fa fa-users text-red"></i>' + obj + " victims are unchecked" +
                            '</a>' +
                            '</li>')
                }
            });</script>
        
        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://localhost/reliefcount',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#relief_count').text(obj);
                }
            });</script>

        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://localhost/notificationforum',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#forum_count').html("&nbsp;&nbsp;You have  " + obj.length + " forum questions");
                    $('#forum_count_min').text(obj.length);
                    $('#forum_count_span').text(obj.length);
                    $('#forum_count_min_2').text(obj.length);
                    $.each(obj, function (index, element) {
                        $('#forum_notification').append('<li><!-- start message -->' +
                                '<a href="#">' + '<div class="pull-left">' +
                                '<img src="dist/img/avatar.png" class="img-circle" alt="User Image">' + '</div>' +
                                '<h4>' +
                                element.username +
                                '</h4>' +
                                '<p>' + element.description + '</p>' +
                                '</a>' +
                                '</li>')
                    });

                }
            });
        </script>

        <script>
//            jQuery.ajax({
//                type: "GET",
//                url: 'http://localhost/notificationprewarnings',
//                dataType: 'json',
//                success: function (obj, textstatus) {
//                    var countDanger = 0;
//                    var countModerate = 0;
//                    var countExtreme = 0;
//                    var totalCount = 0;
//                    $.each(obj, function (index, element) {
//                        var details = element.split("%");
//                        if (details[8] == "extremly danger") {
//                            countExtreme++;
//                        } else if (details[8] == "moderate") {
//                            countModerate++;
//                        } else if (details[8] == "danger") {
//                            countDanger++;
//                        }
//                        totalCount++;
//                    });
//                    $('#warnings_count').text(totalCount);
//                    if (countDanger != 0) {
//                        $('#notifitaions').append('<li>' +
//                                '<a href="/prewarnings">' +
//                                '<i class="fa fa-warning text-yellow"></i>' + countDanger + ' danger warnings' +
//                                '</a>' +
//                                '</li>');
//                    }
//                    if (countExtreme != 0) {
//                        $('#notifitaions').append('<li>' +
//                                '<a href="/prewarnings">' +
//                                '<i class="fa fa-warning text-red"></i>' + countExtreme + ' extreme danger warnings' +
//                                '</a>' +
//                                '</li>');
//                    }
//                    if (countModerate != 0) {
//                        $('#notifitaions').append('<li>' +
//                                '<a href="/prewarnings">' +
//                                '<i class="fa fa-warning text-blue"></i>' + countModerate + ' moderate danger warnings' +
//                                '</a>' +
//                                '</li>');
//                    }
//                }
//            });</script>

        <script>
            var map;
            function initialize() {

                var mapOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(6.990410, 81.056614),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('mapvictim'),
                        mapOptions);
                jQuery.ajax({
                    type: "GET",
                    url: 'http://localhost/victimmap',
                    dataType: 'json',
                    success: function (obj, textstatus) {
                        $.each(obj, function (index, text) {
                            details = text.split(" ");
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(details[0], details[1]),
                                title: details[8]
                            });
                            marker.setMap(map);
                        });
                    }
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script>
            var map2;
            function initialize2() {

                var mapOptions2 = {
                    zoom: 8,
                    center: new google.maps.LatLng(6.990410, 81.056614),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map2 = new google.maps.Map(document.getElementById('mapwarnings'),
                        mapOptions2);
                        
                
                jQuery.ajax({
                    type: "GET",
                    url: 'http://localhost/notificationprewarnings',
                    dataType: 'json',
                    success: function (obj, textstatus) {
                        var countDanger = 0;
                        var countModerate = 0;
                        var countExtreme = 0;
                        var totalCount = 0;
                        $.each(obj, function (index, element) {
                            var details = element.split("%");
                            if (details[8] == "extremly danger") {
                                countExtreme++;
                            } else if (details[8] == "moderate") {
                                countModerate++;
                            } else if (details[8] == "danger") {
                                countDanger++;
                            }
                            totalCount++;
                            
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(details[6], details[7]),
                                title: details[8]
                            });
                            marker.setMap(map2);
                            
                        });
                        $('#warnings_count').text(totalCount);
                        if (countDanger != 0) {
                            $('#notifitaions').append('<li>' +
                                    '<a href="/prewarnings">' +
                                    '<i class="fa fa-warning text-yellow"></i>' + countDanger + ' danger warnings' +
                                    '</a>' +
                                    '</li>');
                        }
                        if (countExtreme != 0) {
                            $('#notifitaions').append('<li>' +
                                    '<a href="/prewarnings">' +
                                    '<i class="fa fa-warning text-red"></i>' + countExtreme + ' extreme danger warnings' +
                                    '</a>' +
                                    '</li>');
                        }
                        if (countModerate != 0) {
                            $('#notifitaions').append('<li>' +
                                    '<a href="/prewarnings">' +
                                    '<i class="fa fa-warning text-blue"></i>' + countModerate + ' moderate danger warnings' +
                                    '</a>' +
                                    '</li>');
                        }
                    }
                });
                
            }

            google.maps.event.addDomListener(window, 'load', initialize2);
        </script>

    </body>
</html>



