<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title;?></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/fontawesome/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/components.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <div class="search-element">
                </div>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>

                </li>
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>

                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?php echo base_url('assets');?>/dist/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <?php if ($this->session->flashdata('bukanadmin')): ?>
        <script>
            swal({
                icon: "error",
                text: 'Maaf Anda Tidak Memiliki Akses',
            });
        </script>
<?php endif; ?>