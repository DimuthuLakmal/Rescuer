@extends('master')
@section('head')

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
<style>
    #map {
        width: 1085px;
        height: 500px;
    }
</style>
@stop
@section('script_head')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
@stop
@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Victims
    </h1>
    <ol class="breadcrumb">
        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Victims</li>
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
@stop
