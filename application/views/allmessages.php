<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Messages
        <small>Messaging System</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Messages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
                
        <?php echo form_open('messages/delete'); ?>
            <?php $this->load->view('modal/confirm'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <button type="button" data-target="#search_admin_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button>
                  <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Sender</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                  <tbody>
                
                <?php foreach($record as $row): ?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                            $date = date('M d, Y h:i:s A',strtotime($row->date)); 
                            echo $date; 
                        ?>  
                    </td>
                    <td class="mailbox-name">
                        <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->Message_model->get_username($row->user_from);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                      
                      <td class="mailbox-name">
                        <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php echo $row->message_id; ?>">
                            <strong>
                            <?php if($row->status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->Message_model->get_username($row->user_to);?>
                            <?php if($row->status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>        
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($row->subject!='') ? $row->subject:'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->Message_model->string_limit_words($row->content,10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->Message_model->time_diff($row->date); ?></td>
                    
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
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! No messages in this section! | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
              </form>          
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>messages">refresh this page</a> or try using the <a href="#search_admin_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>messages/search">
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
<?php $this->load->view('modal/read'); ?>
<?php $this->load->view('modal/search'); ?>
<?php $this->load->view('script/message'); ?>
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
