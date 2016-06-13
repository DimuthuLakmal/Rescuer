@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | View Rescue Center</title>
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
@section('body')
<section class="content-header">
    <h1>
        Rescue Centers
        <small>View Rescue Center</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/rescuecenter"> View All Rescue Centers</a></li>
        <li class="active">View Rescue Center</li>
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
            <h3 class="box-title">Rescue Center Details</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{'/rescuecenter/'.$rescuecenter->id}}" method="POST">
            <input type="hidden" name="functionname" value="add">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">                                                                                      
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $rescuecenter->name ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-10">                                                                                      
                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $rescuecenter->telephone ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Areas</label>
                    <div class="col-sm-10">                                                                                      
                        <input type="text" class="form-control" id="areaselect" name="areaselect" disabled>
                    </div>
                </div>
                <input type="hidden" id="selected_areas" name="selected_areas">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">                                                                                      
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $rescuecenter->type ?>" disabled>
                    </div>
                </div>
                <?php
                $towns = "";
                foreach ($coverage_areas as $coverage_area) {
                    $towns .= $coverage_area->town . '%';
                }
                ?>
                <input type="hidden" value="<?php echo $towns ?>" name="deleted_selected_areas" id="deleted_selected_areas">
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">                                                                                      
                        <h4 id="selected_areas_span">
                            @foreach($coverage_areas as $coverage_area)
                            <span class="label label-success">{{$coverage_area->town}}</span>&nbsp<button class="btn btn-info btn-sm removebtn">Remove</button>&nbsp;&nbsp;&nbsp;&nbsp
                            @endforeach
                        </h4>
                    </div>
                </div>
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" id="updatebtn">Update Details</button>
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
        </form>
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
$('[data-remodal-id=modal2]').remodal({
    modifier: 'with-red-theme'
});
</script>

<script>
    $('#updatebtn').click(function (e) {

        if ($(this).text() != 'Save') {
            e.preventDefault();
            $('#name').removeAttr("disabled");
            $('#type').removeAttr("disabled");
            $('#telephone').removeAttr("disabled");
            $('#areaselect').removeAttr("disabled");
            $(this).text("Save");
        }
    })
</script>

<script>
    $(document).on('click', '.removebtn', function (e) {
        e.preventDefault();
        var removed_town = $(this).prev().text();
        var selected_areas = $('#deleted_selected_areas').val();
        var new_selected_areas = selected_areas.replace(removed_town, "");
        $('#deleted_selected_areas').val(new_selected_areas);
        $(this).hide('fast');
        $(this).prev().hide('fast');
    });
</script>
<script>
    $('#areaselect').keypress(function (e) {

        if (e.which == 13) {
            e.preventDefault();
            var area = $(this).val();
            $('#selected_areas_span').append('<span class="label label-success">' + area + '</span>&nbsp<button class="btn btn-info btn-sm removebtn">Remove</button>&nbsp;&nbsp;&nbsp;&nbsp');
            var selected_areas = $('#selected_areas').val();
            selected_areas += area + '%';
            $('#selected_areas').val(selected_areas);
        }
    })
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