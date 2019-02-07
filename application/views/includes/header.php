<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $pageTitle; ?></title>
<!-- Animate.css -->
<link rel="stylesheet" href="assets/css/animate.css">
<!-- Icomoon Icon Fonts-->
<!-- Bootstrap  -->
<!-- Superfish -->
<link rel="stylesheet" href="assets/css/superfish.css">

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.4 -->


<!-- FontAwesome 4.3.0 -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />
<!-- Ionicons 2.0.0 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/css/ionicons.min.css" rel="stylesheet"
    type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

<!-- datatable -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/sc-1.5.0/datatables.min.css" />
<!-- <link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" /> -->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>


<style>
body {
    font-family: 'Times New Roman';
}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */

.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

select {
    text-indent: 5%;
}
</style>
<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<!-- chart -->
<style type="text/css">
html,
body,
#myChart {
    width: 100%;
    height: 100%;
}

.zc-ref {
    display: none;
}

#wrapper {
    position: relative;
    width: 200px;
    height: 200px;
}

.background {
    color: #999999;
    position: center;
    top: 0;
    left: 0;
    z-index: -100;
}

.font-tnr {
    font-family: 'Times New Roman' !important;
}
</style>

</head>
<!-- chart end -->


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body background='assets/images/background.jpg' class="hold-transition skin-black sidebar-mini"
    class="skin-blue font-tnr">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo" style="min-height: 80px;">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/images/paws.png" width="50%"
                        height="50%"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="<?php echo base_url(); ?>assets/images/logo2.png" width="130px" height="80px"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a> -->
                        <!--  <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                </ul> -->
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image"
                                    alt="User Image" />
                                <span class="hidden-xs"><?php echo $name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle"
                                        alt="User Image" />
                                    <p>
                                        <?php echo $name; ?>
                                        <small><?php echo $role_text; ?></small>
                                    </p>

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i
                                                class="fa fa-user-circle"></i> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i
                                                class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
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
                <div class="user-panel">
                    <!--  <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" width='60%' height='60%'  class="img-circle" alt="User Image"  />
        </div> -->
                    <!--    <div class="pull-left info">
         <p style="color:  white;">
                      <?php echo $name; ?>
                  <?php echo $role_text; ?> 
                    </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
                </div>

                <br>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>petlist">
                            <i class="fa fa-paw"></i>
                            <span>Pets</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>adopterList">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>adoptionrequests">
                            <i class="fa fa-list-alt"></i>
                            <span>Adoption Requests</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>PetCrueltyList">
                            <i class="fa  fa-flag"></i>
                            <span>Pet Cruelty</span>
                            <span class="pull-right-container">

                                <!--  <span class="label label-primary pull-right"><?php echo $pending->pending; ?></span> -->
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>reports">
                            <i class="fa fa-files-o"></i>
                            <span>Reports</span>
                        </a>
                    </li>

                    <?php
            }
             if($role_text == 'System Administrator')
            {
            ?>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>userListing">
                            <i class="fa fa-users"></i>
                            <span>Administrator</span>
                        </a>
                    </li>
                    <?php
            }
            ?>
            </section>
            <!-- /.sidebar -->
        </aside>