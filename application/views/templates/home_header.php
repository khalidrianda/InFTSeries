<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>InFTSeries</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link href="<?php base_url(); ?>../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

  <!-- Custom styles for this template-->
  <link href="<?php base_url(); ?>../assets/css/sb-admin-2.css" rel="stylesheet">
   <link href="<?php base_url(); ?>../assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
          rel="stylesheet">
  

    <!-- DataTables Responsive CSS -->
  <link href="<?php base_url(); ?>../assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body style="background-color: #d4edda;">
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area " >
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="<?php echo base_url('home'); ?>">
                                        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                           <li><a href="<?php echo base_url('home/guide'); ?>">Guide</a></li>
                                            <li><a href="<?php echo base_url('home/tutorial'); ?>">Tutorial</a></li>
                                            <li><a href="<?php echo base_url('home/research'); ?>">Research</a></li>
                                            <li><a href="<?php echo base_url('home/community'); ?>">Community</a>
                                            </li>
                                            <li><a href="<?php echo base_url('home/develop'); ?>">Dev</i></a>
                                                
                                            </li>
                                            <li><a href="<?php echo base_url('home/kontak'); ?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a><i class="fa fa-phone"></i> +62 8226 7957 955</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <?php if($login=="tidak ada") : ?>
                                            <a class="boxed-btn4" href="<?php echo base_url('auth'); ?>">Login</a>
                                        <?php else : ?>
                                            <a class="boxed-btn4" href="<?php echo base_url('projek'); ?>">My Project</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->