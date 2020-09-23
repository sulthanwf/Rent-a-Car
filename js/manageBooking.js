jQuery(document).on('click', '.accept', function(){
    const id = $(this).parents("tr").attr("id");
    acceptBooking(id);

    function acceptBooking(id){
        if(confirm('Are you sure accept this request ?')){
            $.ajax({
               url: 'controllers/c.manage_booking.php',
               type: 'POST',
               data: {action: 'accept', id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function() {
                    $('.table').load('manage_booking.php .table');
                    alert("Request " + id +  " has been accepted");  
               }
            });
        }
    }
});

jQuery(document).on('click', '.reject', function(){
    const id = $(this).parents("tr").attr("id");
    rejectBooking(id);

    function rejectBooking(id){
        if(confirm('Are you sure to reject this request ?')){
            $.ajax({
               url: 'controllers/c.manage_booking.php',
               type: 'POST',
               data: {action: 'reject', id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function() {
                    $('.table').load('manage_booking.php .table');
                    alert("Request " + id +  " has been rejected");  
               }
            });
        }
    }
});