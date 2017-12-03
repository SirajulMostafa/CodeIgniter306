<?php
    $level = $this->session->userdata('level');
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>img/message-logo.png" class="img-circle" alt="User Image">
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