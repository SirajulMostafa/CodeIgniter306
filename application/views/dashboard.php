<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Messaging System</small>
      </h1>
     
    </section>
    
    <section class="content">
        
          <!-- Info boxes -->
          <div class="row">
        <div class="col-xs-6">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Inbox</span>
                  <span class="info-box-number"><?php echo $count_inbox; ?> <small><?php echo ($count_inbox<=1)?'Message':'Messages';?></small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-xs-6">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sent Items</span>
                  <span class="info-box-number"><?php echo $count_sent; ?>
                   <small><?php echo ($count_sent<=1)?'Message':'Messages';?></small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
         </div>
    
      <div class="row">
        <div class="col-lg-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Messages Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar" style="height: 300px; position: relative;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->            
        </div><!-- /.col -->
          
          <div class="col-lg-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Messages Report</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line" style="height: 300px; position: relative;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->            
        </div><!-- /.col -->
      </div><!-- /.row -->
        
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('modal/compose'); ?>

<link rel="stylesheet" href="<?php echo base_url();?>plugins/morris/morris.css">
<script src="<?php echo base_url();?>plugins/morris/raphael-min.js"></script>
<script src="<?php echo base_url();?>plugins/morris/morris.js"></script>
<script type="text/javascript">
$(function(){
    var data = null;
    <?php echo "var url='".base_url()."';";?>
    $.ajax({    
        url: url+'dashboard/barGraph', 
        type: 'POST',
        success: function(dataJim) {  
           
            data = jQuery.parseJSON(dataJim);
            Morris.Bar({
              element: 'bar',
              data: data,
              xkey: 'section',
              ykeys: ['messages'],
              labels: ['Messages record'],
              resize: true,
              xLabelAngle: 60
            });
        }
     }); 

    
    $.ajax({    
        url: url+'dashboard/lineGraph', 
        type: 'POST',
        success: function(dataJim) {                                                
            data = jQuery.parseJSON(dataJim);
            Morris.Line({
              element: 'line',
              data: data,
              xkey: 'period',
              ykeys: ['inbox', 'sent'],
              labels: ['Inbox', 'Sent Items'],
              resize: true
            });  
        }
     }); 
    
});
</script>
