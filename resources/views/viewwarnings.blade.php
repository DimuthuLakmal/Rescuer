@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | View Warnings</title>
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
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    #map {
        width: 1085px;
        height: 500px;
    }
</style>
@stop
@section('script_head')

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var mesg = "Address: " + address;
            mesg += "\nLatitude: " + latitude;
            mesg += "\nLongitude: " + longitude;
            $('#lat').val(latitude);
            $('#lng').val(longitude);
        });
    });
</script>
@stop

@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pre-Warnings
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Pre-Warnings</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Warnings Table</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="warning_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Warning ID</th>
                        <th>Category</th>
                        <th>Address</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($warnings as $warning)
                    <tr>
                        <td>{{$warning->id}}</td>
                        <td>{{$warning->type}}</td>
                        <td>{{$warning->address}}</td>
                        <td>{{$warning->lat}}</td>
                        <td>{{$warning->lng}}</td>
                        <td>{{$warning->start_time}}</td>
                        <td>{{$warning->end_time}}</td>
                        <td>{{$warning->level}}</td>
                        <td><a class="btn btn-info" href="<?php echo 'warnings/' . $warning->id ?>">Update</a></td>
                    </tr>
                    @endforeach
                </tbody>                                
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Warning Map</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div id="map">

        </div>
    </div><!-- /.box -->


</section><!-- /.content -->
@stop
@section('script_footer')
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script>
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD HH:mm:ss'});
</script>
<script>
    $(function () {
        $("#warning_table").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script>
    var lats = [];
    var lngs = [];
    var description = [];
    var i = 0;
    var j = 0;
    var l = 0;

    $('#warning_table tr td:nth-child(2)').filter(function () {
        description[l] = $(this).text();
        l += 1;
    });

    $('#warning_table tr td:nth-child(4)').filter(function () {
        lats[i] = $(this).text();
        i += 1;
    });

    $('#warning_table tr td:nth-child(5)').filter(function () {
        lngs[j] = $(this).text();
        j += 1;
    });


    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(6.990410, 81.056614),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);


    for (var k = 0; k < j; k++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lats[k], lngs[k]),
            title: description[k]
        });
        marker.setMap(map);
    }


</script>
@stop