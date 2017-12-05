<?php
    // $level = $this->session->userdata('level');
    // $img = $this->session->userdata('img');
    // $img_url = base_url('uploads/'.$img);
//this three line add header page
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image">
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
  
            </div>
            <div class="pull-left info">
              <p><?php echo $fullname; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
        <section class="sidebar">
            <center>
                <img src="<?php echo base_url(); ?>img/sms.png" style="width:60%">
                
            </center>
            <br>
              <button style="background-color: #fff" type="button" class="btn btn-default  btn-lg  col-sm-12 " data-target="#compose_mail" data-toggle="modal">Compose</button>    
                   <!-- fired/load modal/compose.php -->

            <div class="clearfix" style=" padding-top: 20px; padding-bottom: 20px;"></div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo base_url();?>inbox"><i class="fa fa-envelope"></i> <span>Inbox</span></a></li>
            <li><a href="<?php echo base_url();?>sentitems"><i class="fa fa-envelope-o"></i> <span>Sent Items</span></a></li>
            <li class="<?php if($level!='admin') echo 'hide';?>">
                <a href="<?php echo base_url();?>messages"><i class="fa fa-archive"></i> <span>All Messages</span></a>
            </li>
            <li class="<?php if($level!='admin') echo 'hide';?>"><a href="<?php echo base_url();?>users"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li><a href="<?php echo base_url();?>settings"><i class="fa fa-gears"></i> <span>Settings</span></a></li>
         </ul>
        </section>
        <!-- /.sidebar -->
      </aside>