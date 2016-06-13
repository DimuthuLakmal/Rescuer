@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | View News</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/remodal-default-theme.css">
<link rel="stylesheet" href="bootstrap/css/remodal.css">
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

@stop
@section('body')
<section class="content-header">
    <h1>
        News
        <small>View News/Notificaion</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View News/Notification</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="col-md-12" id="modal-div">
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Warnings Table</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">News</a></li>
                    <li><a href="#tab_2" data-toggle="tab"></a>Notifications</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="news_table" class="table table-bordered table-striped">
                            <tbody>
                                <?php
                                foreach ($news as $n) {
                                    if ($n->type == 'News') {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $pos = strpos($n->description, "src=");
                                                $end_pos = strpos($n->description, '"', $pos + 5);
                                                $img_url = substr($n->description, $pos + 5, $end_pos - 13);
                                                ?>
                                                <h3><u><?php echo $n->title ?></u></h3>
                                                <table>
                                                    <tr>
                                                        <td width="10%"><img src="<?php echo $img_url ?>" width="75" height="75"></td>

                                                        <td style="padding-left: 10px; color: #95979c; font-size: 15px;" width="80%" >
                                                            <p style="font-size: 12px"><?php echo $n->date ?></p>
                                                            <?php echo substr(preg_replace("/\<img(.*?)>/", "", $n->description), 0, 400); ?>
                                                            <div style="display: none"><?php echo $n->description ?></div>
                                                            <a class="readmore">Read More...</a>
                                                        </td>
                                                        <td width="10%"><td><a class="btn btn-info" href="<?php echo 'news/' . $n->id ?>">Update</a></td></td>
                                                    </tr>
                                                </table>
                                            </td>                                               
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>                                
                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="notification_table" class="table table-bordered table-striped">
                            <tbody>
                                <?php
                                foreach ($news as $n) {
                                    if ($n->type == 'Notification') {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $pos = strpos($n->description, "src=");
                                                $end_pos = strpos($n->description, '"', $pos + 5);
                                                $img_url = substr($n->description, $pos + 5, $end_pos - 13);
                                                ?>
                                                <h3><u><?php echo $n->title ?></u></h3>
                                                <table>
                                                    <tr>
                                                        <td width="10%"><img src="<?php echo $img_url ?>" width="75" height="75"></td>

                                                        <td style="padding-left: 10px; color: #95979c; font-size: 15px;" width="80%" >
                                                            <p style="font-size: 12px"><?php echo $n->date ?></p>
                                                            <?php echo substr(preg_replace("/\<img(.*?)>/", "", $n->description), 0, 400); ?>
                                                            <div style="display: none"><?php echo $n->description ?></div>
                                                            <br><a class="readmore">Read More...</a>
                                                        </td>
                                                        <td width="10%"><td><a class="btn btn-info" href="<?php echo 'news/' . $n->id ?>">Update</a></td></td>
                                                    </tr>
                                                </table>
                                            </td>                                               
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>                                
                        </table>
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
            <a class="btn btn-default" style="color: #a07cbc;display: none" id="modalBtn" href="#modal"><strong>View News</strong></a>
        </div><!-- /.box-body -->
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
<script src="bootstrap/js/jquery-2.1.3.min.js"></script>
<script src="bootstrap/js/remodal.min.js"></script>
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
    $('[data-remodal-id=modal2]').remodal({
        modifier: 'with-red-theme'
    });
</script>
<script>
    $('.readmore').click(function () {
        var content = $(this).prev().html();
        $('#modal-div').empty();
        $('#modal-div').append(content);
        $('#modal-div').append('<br><button data-remodal-action="confirm" class="btn btn-success remodal-confirm btn-sm">OK</button>')
        $('#modalBtn').get(0).click();
    })
</script>
@stop