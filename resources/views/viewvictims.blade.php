
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="_token" content="{{ csrf_token() }}"/>
        <title>Rescuer | Victims</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        #map {
            width: 1085px;
            height: 500px;
        }
    </style>

    <body class="hold-transition skin-blue sidebar-mini">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
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
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li><!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Create a nice theme
                                                        <small class="pull-right">40%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Some task I need to do
                                                        <small class="pull-right">60%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">@if(Auth::check())
                                        {{Auth::user()->username}}
                                        @endif</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            @if(Auth::check())
                                            {{Auth::user()->username}}
                                            @endif
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>WARNINGS</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="AddWarnings.php"><i class="fa fa-circle-o"></i> New Warning</a></li>
                                <li><a href="ViewWarnings.php"><i class="fa fa-circle-o"></i> View All Warnings</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Update Warnings</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>FAQ</span>
                                <span class="label label-primary pull-right">4</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="faq.php"><i class="fa fa-circle-o"></i> View All Questions</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Followed Questions</a></li>
                            </ul>
                        </li>           
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Guidelines</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> View Guidelines</a></li>
                                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Update Guidelines</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="Prewarnings.php">
                                <i class="fa fa-envelope"></i> <span>Weather Warnings</span>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">                        

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Land Slide</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Wild Fire</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Flood</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <!-- Box Comment -->
                                <div class="box box-widget">
                                    <table id="landslide_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Victims Amount</th>
                                                <th>Contact Nubmer</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($victims as $victim)
                                            @if($victim['type']=='Land Slide')
                                            <tr>
                                                <td>{{$victim->id}}</td>
                                                <td>{{$victim->victims_amount}}</td>
                                                <td>{{$victim->contact_number}}</td>
                                                <td>{{$victim->address}}</td>
                                                <td class="lat">{{$victim->lat}}</td>
                                                <td class="lan">{{$victim->lan}}</td>
                                                <td>{{$victim->date}}</td>
                                                <td>{{$victim->type}}</td>
                                                @if($victim->action==0)
                                                <td><a class="btn btn-info check">Check</a></td>
                                                @elseif($victim->action==1)
                                                <td><a class="btn btn-info uncheck">Uncheck</a></td>
                                                @endif
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>                                
                                    </table>
                                </div><!-- /.box -->
                                <!-- form start -->
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="box box-widget">
                                    <table id="wildfire_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Victims Amount</th>
                                                <th>Contact Nubmer</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($victims as $victim)
                                            @if($victim['type']=='Wild Fire')
                                            <tr>
                                                <td>{{$victim->id}}</td>
                                                <td>{{$victim->victims_amount}}</td>
                                                <td>{{$victim->contact_number}}</td>
                                                <td>{{$victim->address}}</td>
                                                <td class="lat">{{$victim->lat}}</td>
                                                <td class="lan">{{$victim->lan}}</td>
                                                <td>{{$victim->date}}</td>
                                                <td>{{$victim->type}}</td>
                                                @if($victim->action==0)
                                                <td><a class="btn btn-info check">Check</a></td>
                                                @elseif($victim->action==1)
                                                <td><a class="btn btn-info uncheck">Uncheck</a></td>
                                                @endif
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>                                
                                    </table>
                                </div>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">

                                <div class="box box-widget">
                                    <table id="flood_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Victims Amount</th>
                                                <th>Contact Nubmer</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($victims as $victim)
                                            @if($victim['type']=='Flood')
                                            <tr>
                                                <td>{{$victim->id}}</td>
                                                <td>{{$victim->victims_amount}}</td>
                                                <td>{{$victim->contact_number}}</td>
                                                <td>{{$victim->address}}</td>
                                                <td class="lat">{{$victim->lat}}</td>
                                                <td class="lan">{{$victim->lan}}</td>
                                                <td>{{$victim->date}}</td>
                                                <td>{{$victim->type}}</td>
                                                @if($victim->action==0)
                                                <td><a class="btn btn-info check">Check</a></td>
                                                @elseif($victim->action==1)
                                                <td><a class="btn btn-info uncheck">Uncheck</a></td>
                                                @endif
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>                                
                                    </table>
                                </div>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Victim Map</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div id="map">

                        </div>
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Titans</a>.</strong> All rights reserved.
            </footer>


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
$.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
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

        <script type="text/javascript">
$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});
        </script>

        <script>
            var lats = [];
            var lngs = [];
            var description = [];
            var action = [];
            var i = 0;
            var j = 0;
            var l = 0;
            var m = 0;

            $('#flood_table tr td:nth-child(8)').filter(function () {
                description[l] = $(this).text();
                l += 1;
            });

            $('#flood_table tr td:nth-child(5)').filter(function () {
                lats[i] = $(this).text();
                i += 1;
            });

            $('#flood_table tr td:nth-child(6)').filter(function () {
                lngs[j] = $(this).text();
                j += 1;
            });

            $('#flood_table tr td:nth-child(9)').filter(function () {
                action[m] = $(this).children().text();
                m += 1;
            });


            var mapCanvas = document.getElementById('map');
            var mapOptions = {
                center: new google.maps.LatLng(6.990410, 81.056614),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);


            for (var k = 0; k < j; k++) {
                if (action[k] == "Check") {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                } else {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                }
            }

        </script>
        <script>
            var lats = [];
            var lngs = [];
            var description = [];
            var action = [];
            var i = 0;
            var j = 0;
            var l = 0;
            var m = 0;

            $('#wildfire_table tr td:nth-child(8)').filter(function () {
                description[l] = $(this).text();
                l += 1;
            });

            $('#wildfire_table tr td:nth-child(5)').filter(function () {
                lats[i] = $(this).text();
                i += 1;
            });

            $('#wildfire_table tr td:nth-child(6)').filter(function () {
                lngs[j] = $(this).text();
                j += 1;
            });

            $('#wildfire_table tr td:nth-child(9)').filter(function () {
                action[m] = $(this).children().text();
                m += 1;
            });


            for (var k = 0; k < j; k++) {
                if (action[k] == "Check") {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                } else {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                }
            }


        </script>
        <script>
            var lats = [];
            var lngs = [];
            var description = [];
            var action = [];
            var i = 0;
            var j = 0;
            var l = 0;
            var m = 0;

            $('#landslide_table tr td:nth-child(8)').filter(function () {
                description[l] = $(this).text();
                l += 1;
            });

            $('#landslide_table tr td:nth-child(5)').filter(function () {
                lats[i] = $(this).text();
                i += 1;
            });

            $('#landslide_table tr td:nth-child(6)').filter(function () {
                lngs[j] = $(this).text();
                j += 1;
            });

            $('#landslide_table tr td:nth-child(9)').filter(function () {
                action[m] = $(this).children().text();
                m += 1;
            });


            for (var k = 0; k < j; k++) {
                if (action[k] == "Check") {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                } else {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                        position: new google.maps.LatLng(lats[k], lngs[k]),
                        title: description[k]
                    });
                    marker.setMap(map);
                }
            }


        </script>
        <script>
            $('.check').click(function () {
                var victim_id = $(this).parent().parent().children().first().text();
                var lat = $(this).parent().parent().children('.lat').text();
                var lan = $(this).parent().parent().children('.lan').text();
                var type = $(this).parent().prev().text();
                var element = $(this);
                jQuery.ajax({
                    type: "POST",
                    url: 'http://localhost/victims/' + victim_id + '?_method=PUT',
                    dataType: 'json',
                    data: {action: '1'},
                    success: function (obj, textstatus) {
                        if (obj == 'successfully_updated') {
                            var marker = new google.maps.Marker({
                                icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                                position: new google.maps.LatLng(lat, lan),
                                title: type
                            });
                            marker.setMap(map);
                            element.text("Uncheck");
                            element.removeClass("check");
                            element.addClass("uncheck");
                        }
                    }
                });
            });

        </script>
        <script>
            $('.uncheck').click(function () {
                var victim_id = $(this).parent().parent().children().first().text();
                var lat = $(this).parent().parent().children('.lat').text();
                var lan = $(this).parent().parent().children('.lan').text();
                var type = $(this).parent().prev().text();
                var element = $(this);
                jQuery.ajax({
                    type: "POST",
                    url: 'http://localhost/victims/' + victim_id + '?_method=PUT',
                    dataType: 'json',
                    data: {action: '0'},
                    success: function (obj, textstatus) {
                        if (obj == 'successfully_updated') {
                            var marker = new google.maps.Marker({
                                icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
                                position: new google.maps.LatLng(lat, lan),
                                title: type
                            });
                            marker.setMap(map);
                            element.text("Check");
                            element.removeClass("uncheck");
                            element.addClass("check");
                        }
                    }
                });
            });

        </script>
    </body>
</html>
