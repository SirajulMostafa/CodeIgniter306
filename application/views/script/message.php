<script>
$(function(){
        <?php echo "var url='".base_url()."';";?>

        $('.read_message').on('click',function(){
            var id = $(this).data('id');
            read_message(id,url);
            
        });
    
        $('.read_admin_message').on('click',function(){
            var id = $(this).data('id');
            read_admin_message(id,url);
            
        });
    
        $('.read_sent_message').on('click',function(){
            var id = $(this).data('id');
            read_sent_message(id,url);
            
        });

});
    
function read_message(id,url){
    $.ajax({    
        url: url+'inbox/read_message', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data[0]);
            $('.date_here').html(data[0]['date']);
            $('.sender_here').html(data[0]['username']);
            $('.subject_here').html(data[0]['subject']);
            $('.message_here').html(data[0]['content']);
            $('.sender').html(data[0]['username']);
            $('.send_to').val(data[0]['user_from']);
            $('.reply_subject').val(data[0]['subject']);
        }
    });   
}
    
function read_admin_message(id,url){
    $.ajax({    
        url: url+'messages/read_message', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data);
            $('.date_here').html(data[0]['date']);
            $('.sender_here').html(data[0]['username']);
            $('.receipient_here').html(data[1]);
            $('.subject_here').val(data[0]['subject']);
            $('.message_here').html(data[0]['content']);
            $('.sender').html(data[0]['username']);
            $('.send_to').val(data[0]['user_from']);
            $('.reply_subject').val(data[0]['subject']);
            $('.message_id').val(id);
        }
    });   
}
    
function read_sent_message(id,url){
    $.ajax({    
        url: url+'sentitems/read_message', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data[0]);
            $('.date_here').html(data[0]['date']);
            $('.receiver_here').html(data[0]['username']);
            $('.subject_here').html(data[0]['subject']);
            $('.message_here').html(data[0]['content']);
        }
    });   
}
    

</script>