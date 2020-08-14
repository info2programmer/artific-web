<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>APE Admin Panel</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url() ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url() ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
<div class="page-wrapper-row">
<div class="page-wrapper-top">
    <!-- BEGIN HEADER -->
    <div class="page-header">
        <!-- BEGIN HEADER TOP -->
        <div class="page-header-top">
            <div class="container">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/logo-default.png" alt="logo" class="logo-default" style="margin-top: 13px;width:17%;">
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler"></a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="droddown dropdown-separator">
                            <span class="separator"></span>
                        </li>
                       
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo base_url() ?>/assets/layouts/layout3/img/<?php echo $this->session->userdata('image') ?>">
                                <span class="username username-hide-mobile"><?php echo $this->session->userdata('name') ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url() ?>admin/update_password/">
                                        <i class="icon-user"></i>Change Password</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>admin/logout">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                        <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END HEADER TOP -->
        <!-- BEGIN HEADER MENU -->
        <div class="page-header-menu">
            <div class="container">
                <div class="hor-menu  ">
                    <ul class="nav navbar-nav">
                        <li class="menu-dropdown classic-menu-dropdown">
                            <a href="<?php echo base_url() ?>admin/welcome"> Dashboard
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <?php if(!$this->session->userdata('type')): ?>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="javascript:;"> Site Manager
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" ">
                                        <a href="<?php echo base_url(); ?>product" class="nav-link"> Product List</a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?php echo base_url() ?>portfolio/index" class="nav-link  "> Portfolio Management </a>
                                    </li>

                                    <li class=" ">
                                        <a href="<?php echo base_url() ?>blog/blog_category" class="nav-link  "> Blog Category </a>
                                    </li>

                                    <li class=" ">
                                        <a href="<?php echo base_url() ?>admin/user_management" class="nav-link  "> User Management </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="menu-dropdown classic-menu-dropdown">
                            <a href="<?php echo base_url() ?>blog/index"> Blog
                                <span class="arrow"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MEGA MENU -->
            </div>
        </div>
        <!-- END HEADER MENU -->
    </div>
    <!-- END HEADER -->
</div>
</div>

<?php $this->load->view($main_view); ?>

  <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container"> <?php echo date('Y') ?> &copy; 
                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
   
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>