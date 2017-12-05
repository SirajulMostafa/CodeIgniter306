<?php
    $user = $this->User_model->user_info();
    foreach($user as $user){
        $fullname = strtoupper($user->username);
    }
    
?>
<?php
    $level = $this->session->userdata('level');
    $img = $this->session->userdata('img');
    $img_url = base_url('uploads/'.$img);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/Lobibox/lobibox.css">
    <link rel="icon" href="<?php echo base_url();?>img/favicon.png" />
      
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>dist/js/demo.js"></script>
    <script src="<?php echo base_url();?>dist/js/script.js"></script>
      <script src="<?php echo base_url();?>plugins/Lobibox/lobibox.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">MS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Messaging</b>System</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                $image_properties = array(
                    'src'    =>     $img_url,
                    'alt'    =>     'User Image',
                    'class'  =>     'user-image',
                    'width'  =>     '200',
                    'height' =>     '200',
                    'title'  =>     'That was quite a night',
                    'rel'    =>     'lightbox',
               );
              
               echo img($image_properties);
             ?>  
                  <span class="hidden-xs">Hello, <?php echo $fullname;?> <i class="fa fa-caret-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
              <?php 
              $image_properties = array(
                  'src'    =>     $img_url,
                  'alt'    =>     'User Image',
                  'class'  =>     'img-circle',
                  'width'  =>     '200',
                  'height' =>     '200',
                  'title'  =>     'That was quite a night',
                  'rel'    =>     'lightbox',
             );
              
             echo img($image_properties);
             ?>  
                  </li>
               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>settings" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-gear"></i>setting</a>
                    </div>
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>settings/image_upload" class="btn btn-info btn-flat btn-sm"><i class="fa fa-user"></i> picture</a>
                    </div>
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>dashboard/logout" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li class="hide">
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-bullhorn"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>