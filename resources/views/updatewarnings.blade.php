@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | Update Warnings</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap/css/remodal-default-theme.css">
<link rel="stylesheet" href="/bootstrap/css/remodal.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="/plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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

<script>
    var global_map;
    var global_marker = null;
    function initialize() {
        var latitude = $('#lat').val();
        var longitude = $('#lng').val();
        geocoder = new google.maps.Geocoder();
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: new google.maps.LatLng(6.990410, 81.056614),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        global_map = map;
        global_marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            map: global_map, // handle of the map 
            draggable: true
        });
        google.maps.event.addListener(global_marker, 'dragend', function () {
            geocodePosition(global_marker.getPosition());
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


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

            if (global_marker != null) {
                global_marker.setMap(null);
            }

            global_marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longitude),
                map: global_map, // handle of the map 
                draggable: true
            });
            google.maps.event.addListener(global_marker, 'dragend', function () {
                geocodePosition(global_marker.getPosition());
            });
        });
    });
    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function (responses) {
            if (responses && responses.length > 0) {
                $('#lat').val(pos.lat());
                $('#lng').val(pos.lng());
                $('#txtPlaces').val(responses[0].formatted_address);
                updateMarkerAddress(responses[0].formatted_address);
            } else {
                updateMarkerAddress('Cannot determine address at this location.');
            }
        });
    }
</script>

@stop

@section('body')
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

    <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="col-md-12">
            <h4>Successfully Updated!</h4>
            <button data-remodal-action="confirm" class="btn btn-success remodal-confirm btn-sm">OK</button>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Warning Details</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{'/warnings/'.$warning->id}}" method="POST">
            <input type="hidden" name="lat" id="lat" value="<?php echo $warning->lat ?>">
            <input type="hidden" name="lng" id="lng" value="<?php echo $warning->lng ?>">
            <input type="hidden" name="functionname" value="add">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="type">
                            <option value="Land Slide">Land Slide</option>
                            <option value="Wild Fire">Wild Fire</option>
                            <option value="Flood">Flood</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Start Time & End Time</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control pull-right" id="reservationtime" name="startandendtime" value="<?php echo str_replace('-', '/', $warning->start_time) . ' - ' . str_replace('-', '/', $warning->end_time) ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Place</label>
                    <div class="col-sm-10">                                                                                      
                        <input type="text" class="form-control" id="txtPlaces" name="address" value="<?php echo $warning->address ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">                                                                                      
                        <select class="form-control select2" style="width: 100%;" name="level">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update Warning</button>
            </div>
            <a class="btn btn-default" style="color: #a07cbc;display: none" id="modalBtn" href="#modal"><strong>Successfully insterted</strong></a>
            <?php if (!empty($errors) && count($errors) > 0) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Invalid details. Please recheck inputs & try again!</h4>
                    @foreach($errors-> all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                </div>
            <?php } ?> 
            <?php if (session('dateerror')) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Invalid details. Please recheck inputs & try again!</h4>
                    <p>{{session('dateerror')}}</p>
                </div>
            <?php } ?> 
        </form>
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
<script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/bootstrap/js/jquery-2.1.3.min.js"></script>
<script src="/bootstrap/js/remodal.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<script>
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD HH:mm:ss'});
</script>

<script>
    $('[data-remodal-id=modal2]').remodal({
        modifier: 'with-red-theme'
    });
</script>

<?php
if (session('success')) {
    ?>
    <script>
        $('#modalBtn').get(0).click();
    </script>
    <?php
}
?>
@stop