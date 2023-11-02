<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url() ?>uploads/favicon.svg" type="image/x-icon">
    <title>Seven Inc | POS Djuragan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/choices.js/choices.min.css" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">

    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery UI 1.11.4 -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/dist/img/favicon.png" type="image/gif">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.css">
    <script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropdown/css/dd.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/magnific/magnific-popup.css">
    <script src="<?php echo base_url() ?>assets/plugins/magnific/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <style>
    #notif p {
        margin-right: -175px;
    }

    #notif-head {
        height: 70px;
        margin-top: 4.5;
    }

    .notif {
        background-color: transparent;
    }

    .notif:hover {
        background-color: #acacac;
    }
    </style>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <!-- <a href="index2.html" class="logo"> -->
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- <span class="logo-mini"><b>S</b>I</span> -->
            <!-- logo for regular state and mobile devices -->
            <!-- <span class="logo-lg"><b>Seven</b>INC.</span> -->
            <!-- </a> -->
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" style="background-color: #222d32;">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <?php
                $numnof = $this->db->query("SELECT * FROM detail_penjualan WHERE status_transaksi='1'");
                ?>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"><?php echo $numnof->num_rows(); ?></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header" id="notif-head" style="background-color:white;">
                                    <p style=" color:black;">NOTIFIKASI! <i class="fa fa-bell"></i></p>
                                    <hr>
                                </li>
                                <li class="user-body" style="width: 100px;">
                                    <div class="row" style="text-align:left; margin-right: -200px;">
                                        <div class="col-md-4" id="notif">
                                            <?php
                                            foreach ($numnof->result() as $uq) :
                                                $idd = $uq->id;
                                            ?>
                                            <a href="" class="notif">
                                                <p><span class="badge bg-info">NEW</span> pembelian
                                                    baru dengan atas nama
                                                    <b><?php echo $uq->nama_pelanggan; ?>.</b>
                                                </p>
                                            </a>
                                            <hr />
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="<?php echo base_url('uploads/operator/') . $foto; ?>" class="user-image" alt="User Image"> -->
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">Hi!,
                                    <?php echo $this->session->userdata['nama_operator']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header" style="background-color: #222d32;">
                                    <i id="ikon" class="fa fa-user"></i>
                                    <p>
                                        <span
                                            class="text-uppercase"><?php echo $this->session->userdata['nama_operator']; ?></span>
                                        <small><a href="#"><i class="fa fa-circle text-success"></i> Online</a></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                    </div>
                                    <a href="<?php echo base_url() ?>index.php/auth/logout"
                                        class="btn btn-default btn-flat" style="text-align:center;">Sign out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel text-center">
                    <img src="<?php echo base_url('uploads/sevenincwhite.png') ?>" style="width: 80%;">
                </div>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php
                if ($this->session->userdata('akses') == 1) {
                    $this->load->view('Template/superadmin_menu');
                } else if ($this->session->userdata('akses') == 2) {
                    $this->load->view('Template/admin_menu');
                } else {
                    $this->load->view('Template/cs_menu');
                }
                ?>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <section class="content-header">
				<h1>
					SEVEN INC.
					<small>Control panel</small>
				</h1>
			</section> -->
            <!-- Main content -->
            <?php echo $contents ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0.0
            </div>
            <strong>&copy; <?php echo date('Y'); ?>. Seven Inc. Allright Reserved.
        </footer>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="<?php echo base_url() ?>assets/plugins/dropdown/js/jquery.dd.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/Bootstrap-validator/validator.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="<?php echo base_url() ?>assets/dist/choices.js/choices.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script
        src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- Slimscroll -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".select22").select2({
            placeholder: "Please Select"
        });
    });
    </script>
    <script src="<?php echo base_url() ?>assets/app/js/common.js"></script>
</body>

</html>