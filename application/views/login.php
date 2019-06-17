<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="DBCInfotech">

    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo base_url('uploads/favicon.png');?>">

    <title><?php echo get_phrase('login');?> | <?php echo get_settings('doctor_name');?></title>

    <link href="<?php echo base_url('assets/backend/bootstrap/dist/css/bootstrap.min.css');?>"
          rel="stylesheet">

    <link href="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css');?>"
          rel="stylesheet">

    <link href="<?php echo base_url('assets/backend/css/animate.css');?>"
          rel="stylesheet">

    <link href="<?php echo base_url('assets/backend/css/style.css');?>"
          rel="stylesheet">

    <link href="<?php echo base_url('assets/backend/css/colors/blue.css');?>"
          id="theme" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>

<body>

<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<section id="wrapper" class="login-register">
    <div class="login-box" style="background-color: #4a3769;">
        <div style="text-align: center; padding: 10px;">
            <img width="60"
                 src="<?php echo base_url('uploads/'.get_settings('logo'));?>">
            <h4 style="color: #fff;">Doctor Chamber Management System</h4>
        </div>
        <div class="white-box" style="padding-top: 40px;">
            <form class="form-horizontal form-material" id="loginform" method="post"
                  action="<?php echo site_url('login/do_login');?>">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" name="email_phone"
                               placeholder="Email/phone" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" name="password"
                               placeholder="Password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-md-12">
                        <a href="<?php echo site_url('login/forgot_password');?>"
                           class="text-dark"><i class="fa fa-lock m-r-5"></i>
                            <?php echo get_phrase('forgot_password');?> ?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<script src="<?php echo base_url('assets/backend/plugins/bower_components/jquery/dist/jquery.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/bootstrap/dist/js/tether.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/jquery.slimscroll.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/waves.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/custom.min.js');?>"></script>

</body>

</html>
