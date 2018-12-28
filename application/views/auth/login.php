<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; E-RAB</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/components.css">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?php echo base_url('assets');?>/dist/img/kll.png" alt="logo" width="100" class="shadow-light">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>
                        <div id="infoMessage"><?php echo $message;?></div>

                        <div class="card-body">
                            <?php echo form_open("auth/login");?>
                                <div class="form-group">
                                    <?php echo lang('login_identity_label', 'identity');?>
                                    <input id="email" type="email" class="form-control" name="identity" value="" id="identity" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <?php echo lang('login_password_label', 'password');?>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            <?php echo form_close();?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="<?php echo base_url('assets');?>/dist/modules/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/popper.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/tooltip.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/moment.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?php echo base_url('assets');?>/dist/js/scripts.js"></script>
<script src="<?php echo base_url('assets');?>/dist/js/custom.js"></script>
</body>
</html>