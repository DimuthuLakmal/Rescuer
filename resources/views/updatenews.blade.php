@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Rescuer | Update News</title>
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

<script type="text/javascript" src="/scripts/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "#editor_news",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste "
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter      alignright alignjustify | bullist numlist outdent indent | link image"
    });

</script>

@stop
@section('body')
<section class="content-header">
    <h1>
        News/Notifications
        <small>Update News/Notification</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update News/Notification</li>
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
            <h3 class="box-title">News/Notification Details</h3>
        </div><!-- /.box-header -->
        <br>
        @if($news->type=='News')
        <form action="{{'/news/'.$news->id}}" method="POST" class='form-horizontal'>
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" id="user_id_news">
            <input type="hidden" value="News" name="type" id="type">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Title</label>
                <div class="col-sm-8">
                    <input  class="form-control" name="title" id="title_news" placeholder="Enter the title" value="<?php echo $news->title ?>">
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-8 col-md-offset-2">
                    <textarea name="description" id="editor_news" style="width:100%" rows="15"><?php echo $news->description ?></textarea>
                </div>
            </div>
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">

                <button class="btn btn-primary" style="color: white;display:block; margin: 0 auto;" id="post_news">Update</button>

            </div>
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
        @else
        <form action="{{'/news/'.$news->id}}" method="POST" class='form-horizontal'>
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" id="user_id_news">
            <input type="hidden" value="News" name="type" id="type">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Title</label>
                <div class="col-sm-8">
                    <input  class="form-control" name="title" id="title_news" placeholder="Enter the title" value="<?php echo $news->title ?>">
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-8 col-md-offset-2">
                    <textarea name="description" style="width:100%" rows="10"><?php echo $news->description ?></textarea>
                </div>
            </div>
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

                <button class="btn btn-primary" style="color: white;display:block; margin: 0 auto;" id="post_news">Update</button>

            </div>
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
        @endif
        <a class="btn btn-default" style="color: #a07cbc;display: none" id="modalBtn" href="#modal"><strong>Successfully updated</strong></a>
        <br>
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

<!--        <script>
            $('#post_news').click(function (e) {
                e.preventDefault();
                var content = tinymce.get("editor_news").getContent();
                //var content = 'aaaaa';
                var title = $('#title_news').val();
                var user_id = $('#user_id_news').val();
                
                jQuery.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: 'http://localhost/news/user_id/' + user_id + '/title/' + title + '/description/' + content,
                    success: function (obj, textstatus) {
                        if (obj == 'Success') {
                            $('#modalBtn').get(0).click();
                        }
                    }
                });


            });
        </script>-->

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