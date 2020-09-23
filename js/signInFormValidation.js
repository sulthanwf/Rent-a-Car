$(document).ready(function() {
    function checkInputs(){
        let successCount = 0;
        let valid = false;

        if($.trim($('#email').val()) === ''){
            setErrorFor($('#email'), 'Email cannot be blank')
        } else if (!isEmail($.trim($('#email').val()))){
            setErrorFor($('#email'), 'Email is not valid')
        } else {
            setSuccessFor($('#email'));
            successCount++
        }

        if ($.trim($('#email').val()) === 'admin'){
            setSuccessFor($('#email'));
            successCount++
        }

        if($.trim($('#password').val()) === ''){
            setErrorFor($('#password'), 'Password cannot be blank')
        } else if($.trim($('#password').val()).length < 8){
            setErrorFor($('#password'), 'Please enter a minimum 8 character password')
        } else if($.trim($('#password').val()).length >20){
            setErrorFor($('#password'), 'Please enter a maximum 20 character password')
        } else {
            setSuccessFor($('#password'));
            successCount++
        }

        if(successCount === 2){
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
    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

    $('#signInForm').submit(function(e) {
        e.preventDefault();

        if(checkInputs() === true){
            $.ajax({
                type: "POST",
                url: 'controllers/c.signin.php',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response); 	
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        setTimeout("location.href = 'index.php';",0);
                    } else {
                        $('#registration_response_msg').html(resultData.message);
                    }
                },
                // This error is a runtime exception
                error: function(response) {
                    console.log(response);
                    $('#registration_response_msg').html("Oops, something went wrong while processing this request. Try again later");
                }
            });
        } else {
            console.log('Did not pass the form validation')
        }
    });
});
