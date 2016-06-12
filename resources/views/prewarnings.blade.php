@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | PreWarnings</title>
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
<!--<script type="text/javascript">
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
</script>-->
@stop
@section('body')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pre-Warnings
    </h1>
    <ol class="breadcrumb">
        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pre-Warnings</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-info">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">LandSlide Weather Warnings</a></li>
                <li><a href="#tab_2" data-toggle="tab"></a>Flood Weather Warning</li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table id="warning_table_landslide" class="table table-bordered table-striped">
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
                                <th>Threat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warnings as $warning)
                            <?php $details = explode('%', $warning); ?>
                            @if($details[1]=='Land Slide')
                            <tr>
                                <td>{{$details[0]}}</td>
                                <td>{{$details[1]}}</td>
                                <td>{{$details[2]}}</td>
                                <td>{{$details[6]}}</td>
                                <td>{{$details[7]}}</td>
                                <td>{{$details[3]}}</td>
                                <td>{{$details[4]}}</td>
                                <td>{{$details[5]}}</td>
                                <th>{{$details[8]}}</th>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>                                
                    </table>
                    <div id="map">

                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
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
                                <th>Threat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warnings as $warning)
                            <?php $details = explode('%', $warning); ?>
                            @if($details[1]=='Flood')
                            <tr>
                                <td>{{$details[0]}}</td>
                                <td class="type">{{$details[1]}}</td>
                                <td>{{$details[2]}}</td>
                                <td>{{$details[6]}}</td>
                                <td>{{$details[7]}}</td>
                                <td>{{$details[3]}}</td>
                                <td>{{$details[4]}}</td>
                                <td>{{$details[5]}}</td>
                                <th>{{$details[8]}}</th>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>                                
                    </table>
                </div><!-- /.tab-pane -->

            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
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
var global_map;
var global_marker = null;
function initialize() {
    geocoder = new google.maps.Geocoder();
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(6.990410, 81.056614),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
    global_map = map;
    $('#warning_table_landslide').children('tbody').children('tr').each(function () {
        i = 0;
        var lat;
        var lng;
        $(this).children('td').each(function () {
            if (i == 3) {
                lat = $(this).text();
            }
            if (i == 4) {
                lng = $(this).text();
            }
            i++;
        });
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: global_map
        });
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop
