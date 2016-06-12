@extends('master')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="_token" content="{{ csrf_token() }}"/>
<title>Rescuer | Forum</title>
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

@section('body')
<section class="content-header">
    <h1>
        Forum
    </h1>
    <ol class="breadcrumb">
        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Forum</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">                        

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Land Slide</a></li>
            <li><a href="#tab_2" data-toggle="tab">Wild Fire</a></li>
            <li><a href="#tab_3" data-toggle="tab">SMS</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @foreach($result as $question)
                @if($question['type']=='Land Slide')
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class='box-header with-border'>
                        <div class='user-block'>
                            <span class='username'><a href="#">{{ $question['username'] }}
                                </a></span>
                        </div><!-- /.user-block -->
                        <div class='box-tools'>
                            <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <p>{{ $question['description'] }}</p></div>
                    <div class='box-footer box-comments allcomments' id="{{ $question['id'] }}">
                        <?php for ($i = 0; $i < count($question) - 4; $i++) { ?>
                            <div class='box-comment'>
                                <!-- User image -->

                                <div class='comment-text'>
                                    <span class="username">
                                        <?php echo $question[(string) $i]->username ?>                                    
                                    </span><!-- /.username -->
                                    <?php
                                    echo $question[(string) $i]->description;
                                    ?>
                                </div><!-- /.comment-text -->
                            </div><!-- /.box-comment -->
                        <?php } ?>
                    </div><!-- /.box-footer -->

                    <div class="box-footer">
                        <form action="#" method="post">                                               
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="hidden" value="<?php echo $question['id'] . '%' . Auth::user()->username . '%' . Auth::user()->id ?>" name="<?php echo $question['id'] ?>">
                                <input type="text" class="form-control input-sm post_comment" placeholder="Press enter to post comment" required>                                                             
                            </div>
                        </form>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
                @endif
                @endforeach
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

                @foreach($result as $question)
                @if($question['type']=='Flood')
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class='box-header with-border'>
                        <div class='user-block'>
                            <span class='username'><a href="#">{{ $question['username'] }}
                                </a></span>
                        </div><!-- /.user-block -->
                        <div class='box-tools'>
                            <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <p>{{ $question['description'] }}</p></div>
                    <div class='box-footer box-comments allcomments' id="{{ $question['id'] }}">
                        <?php for ($i = 0; $i < count($question) - 4; $i++) { ?>
                            <div class='box-comment'>
                                <!-- User image -->

                                <div class='comment-text'>
                                    <span class="username">
                                        <?php echo $question[(string) $i]->username ?>                                    
                                    </span><!-- /.username -->
                                    <?php
                                    echo $question[(string) $i]->description;
                                    ?>
                                </div><!-- /.comment-text -->
                            </div><!-- /.box-comment -->
                        <?php } ?>
                    </div><!-- /.box-footer -->

                    <div class="box-footer">
                        <form action="#" method="post">                                               
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="hidden" value="<?php echo $question['id'] . '%' . Auth::user()->username . '%' . Auth::user()->id ?>" name="<?php echo $question['id'] ?>">
                                <input type="text" class="form-control input-sm post_comment" placeholder="Press enter to post comment">                                                             
                            </div>
                        </form>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
                @endif
                @endforeach

            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">


                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class='box-header with-border'>
                        <div class='user-block'>
                            <span class='username'><a href="#">tag_number
                                </a></span>
                        </div><!-- /.user-block -->
                        <div class='box-tools'>
                            <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <p>description</p></div>                         
                    <div class='box-footer box-comments allcomments' id="tag_number">

                    </div>        
                    <div class="box-footer">
                        <form action="#" method="post">                                               
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push"> 
                                <input type="hidden" value="tag_number" name="tag_number">
                                <input type="text" class="form-control input-sm post_comment_sms" placeholder="Press enter to post comment">                                                             
                            </div>
                        </form>
                    </div><!-- /.box-footer -->
                </div><!-- /.box --> 

            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>


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
<script>
$('.post_comment').keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var element = $(this);
        var comment = $(this).val();
        if (comment != "") {
            //alert(comment);
            var details = $(this).prev().val().split("%");
            var _token = '<?php echo csrf_token() ?>';
            jQuery.ajax({
                type: "POST",
                url: 'answer',
                data: {_token: _token, q_id: details[0], user_id: details[2], description: comment},
                success: function (obj, textstatus) {
                    $('#' + (details[0])).append('<div class=\'box-comment\'><div class=\'comment-text\'><span class=\'username\'>' + details[1] + '</span>' + comment + '<\div><\div>');
                    element.val("");
                }
            });
        } else {
            alert("Please enter your comment");
        }

    }
});
</script>
<script>
    $('.post_comment_sms').keypress(function (e) {
        if (e.which == 13) {

            e.preventDefault();
            var comment = $(this).val();
            //alert(comment);
            //var details = $(this).prev().val();

            jQuery.ajax({
                type: "GET",
                url: 'http://titansmora.com/rescuer/smsreceiver.php?reply=' + comment,
                dataType: 'json',
                success: function (obj, textstatus) {

                }
            });

            //$('#' + (details)).append('<div class=\'box-comment\'><div class=\'comment-text\'>' + comment + '<\div><\div>');

        }
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
</script>

@stop
