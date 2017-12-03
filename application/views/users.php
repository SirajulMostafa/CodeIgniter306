<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Messaging System</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
                
        <?php echo form_open('users/delete'); ?>
            <?php $this->load->view('modal/confirm'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#user_search_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <?php echo validation_errors("<script>
        Lobibox.notify('error', { msg:'", "'});</script>"); ?>
                <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th></th>                        
                        <th>ID No.</th>
                        <th>Username</th>   
                        <th>Date Created</th>
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($record as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="user_id[]" value="<?php echo $row->user_id;?>">
                    </td>                    
                    <td class="mailbox-name">
                        <a href="#user_info_modal" data-toggle="modal" class="user_info" data-id="<?php echo $row->user_id; ?>">
                            <strong>
                                <?php echo $row->id_no;?>
                            </strong>
                        </a>
                      </td>
                      
                      <td class="mailbox-name">
                        <a href="#user_info_modal" data-toggle="modal" class="user_info" data-id="<?php echo $row->user_id; ?>">
                            <strong>
                                <?php echo $row->username;?>           
                            </strong>
                        </a>        
                      </td> 
                      <td class="text-success">
                        <?php 
                            $date = date('M d, Y h:i:s A',strtotime($row->date_created)); 
                            echo $date; 
                        ?>  
                    </td>
                  </tr>                      
                  <?php endforeach; ?>
                    
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! No user in this system! | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! User not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>users">refresh this page</a> or try using the <a href="#user_search_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>users/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
            </div><!-- /.box-body -->
          </div><!-- /.box -->              
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('modal/user_info'); ?>
<?php $this->load->view('modal/search'); ?>
<?php $this->load->view('script/user'); ?>
<?php if(isset($_GET['delete'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Deleted Successfully!'
        });
    </script>
<?php endif; ?>
<?php if(isset($_GET['update'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Updated Successfully!'
        });
    </script>
<?php endif; ?>
