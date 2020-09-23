$(document).ready(function() {
    function checkInputs(){
        let successCount = 0;
        let valid = false;

        if($.trim($('#PickUpDate').val()) === ''){
            setErrorFor($('#PickUpDate'), 'Please choose a date')
        } else {
            setSuccessFor($('#PickUpDate'));
            successCount++
        }

        if(successCount === 1){
            valid = true;
        } else {
            valid = false;
        }

        return valid;

    }

    function setErrorFor(input, message){
        const formControl = input.parent();
        const small = formControl.find('small');
        formControl.removeClass('success');
        formControl.addClass('error');
        small.text(message);
    }
    
    function setSuccessFor(input){
        const formControl = input.parent();
        formControl.removeClass('error');
        formControl.addClass('success');
    }

    $('#bookingForm').submit(function(e) {
        e.preventDefault();

        if(checkInputs() === true){
            let request = 'booking';
            $.ajax({
                type: "POST",
                url: 'controllers/c.request_booking.php',
                data: $(this).serialize() + '&request=' + request,
                success: function(response) {
                    console.log(response); 	
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        $('#response_msg').html(resultData.message);
                    } else {
                        $('#response_msg').html(resultData.message);
                        $('#response_msg').toggleClass("text-danger")
                    }
                },
                error: function(response) {
                    console.log(response);
                    $('#response_msg').html("Oops, something went wrong while processing this request. Try again later");
                }
            });
        } else {
            console.log('Did not pass the form validation')
        }
    });
});