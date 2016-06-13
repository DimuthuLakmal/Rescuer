<!DOCTYPE html>
<html>
    <head>
        @yield('head')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        @yield('script_head')
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
                                    <img src="/dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">
                                        @if(Auth::check())
                                        {{Auth::user()->username}}
                                        @endif
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                        <p>
                                            @if(Auth::check())
                                            {{Auth::user()->username}}
                                            @endif
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div align="center">
                                            <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
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
                            <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
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
                @yield('body')
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2015-2016 <a href="http://almsaeedstudio.com">Titans</a>.</strong> All rights reserved.
            </footer>
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        @yield('script_footer')
        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://titansmora.org/notificationusers',
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
                url: 'http://titansmora.org/victimscount',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#victim_count').text(obj)
                }
            })
                    ;</script>

        <script>
            jQuery.ajax({
                type: "GET",
                url: 'http://titansmora.org/notificationvictims',
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
                url: 'http://titansmora.org/reliefcount',
                dataType: 'json',
                success: function (obj, textstatus) {
                    $('#relief_count').text(obj);
                }
            });</script>

        <script>
            jQuery.ajax({
                                    type: "GET",
                                            url: 'http://titansmora.org/notificationforum',
                    dataType: 'json',
                                            success: function (obj, textstatus) {
                                                    $('#forum_count').html("&nbsp;&nbsp;You have  " + obj.length + " forum questions");                             $('#forum_count_min').text(obj.length);
                                                    $('#forum_count_span').text(obj.length);
                                                    $('#forum_count_min_2').text(obj.length);
                                                    $.each(obj, function (index, element) {
                            $('#forum_notification').append('<li><!-- start message -->' +
                                '<a href="#">' + '<div class="pull-left">' +
                                '<img src="/dist/img/avatar.png" class="img-circle" alt="User Image">' + '</div>' +
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
                                                    jQuery.ajax({
                                                    type: "GET",
                                                            url: 'http://titansmora.org/notificationprewarnings',
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

        </script>
    </body>
</html>



