<script>
$(function(){
        <?php echo "var url='".base_url()."';";?>

        $('.user_info').on('click',function(){
            var id = $(this).data('id');
            user_info(id,url);
            
        });

});
    
function user_info(id,url){
    $.ajax({    
        url: url+'users/get_info', 
        type: 'POST',
        data: { id:id },
        success: function(dataJim) {                        
            data = jQuery.parseJSON(dataJim);
            console.log(data[0]);
            var row = data[0];
            $('.date_here').html(row['date_created']);
            $('.id_no_here').val(row['id_no']);
            $('.username_here').val(row['username']);
            $('.user_id_here').val(id);
        }
    });   
}
    

</script>