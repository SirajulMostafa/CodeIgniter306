<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Messaging System</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Settings</a></li>
         <li class="active"><a href="#">image Upload</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="register-box-body col-sm-offset-3 col-sm-6">
                  <?php if (isset($flash)) { echo $flash;} ?>
                    <p class="login-box-msg">Upload Image</p>
                      <div class="alert alert-danger <?php if(!isset($_GET['errors'])) echo 'hide';?>">
                        <strong>Error!</strong>
                    </div>
                    <?php //echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php echo validation_errors("<script>
        Lobibox.notify('error', { msg:'", "'});</script>"); ?>
                    <?php echo form_open_multipart('settings/image_upload'); ?>
                    <?php foreach($record as $row): ?>
                      <div class="form-group has-feedback">
                        <input readonly type="text" class="form-control" placeholder="ID No." name="id_no" autocomplete="off" value="<?php echo $row->id_no;?>">
                        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input readonly type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" value="<?php echo $row->username;?>">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                        <div class="form-group has-feedback">
                        <input readonly type="password" class="form-control" placeholder="Current Password" name="current_password" >
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input readonly type="password" class="form-control" placeholder="Password" name="password" >
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input readonly type="password" class="form-control" placeholder="Retype password" name="tmp_password" >
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      </div> 
                      <div class="form-group has-feedback">
                        
                    Image upload
                        <input class="form-control" type="file" name="userfile" size="20" />   
                      </div>
                      <div class="row">
                        <div class="col-xs-offset-8 col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-edit"></i> Update</button>
                        </div><!-- /.col -->
                      </div>
                    <?php endforeach; ?>
                    </form>

                  </div><!-- /.form-box -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->              
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php if(isset($_GET['update'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Updated Successfully!'
        });
    </script>
<?php endif; ?>

      
