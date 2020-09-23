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

        if($.trim($('#firstname').val()) === ''){
            setErrorFor($('#firstname'), 'First name cannot be blank')
        } else {
            setSuccessFor($('#firstname'));
            successCount++
        }

        if($.trim($('#lastname').val()) === ''){
            setErrorFor($('#lastname'), 'Last name cannot be blank')
        } else {
            setSuccessFor($('#lastname'));
            successCount++
        }

        if($.trim($('#dlicense').val()) === ''){
            setErrorFor($('#dlicense'), 'Drivers license number cannot be blank')
        } else if($.trim($('#dlicense').val()).length < 8){
            setErrorFor($('#dlicense'), 'Please enter a valid drivers license')
        } else {
            setSuccessFor($('#dlicense'));
            successCount++
        }

        if($.trim($('#address').val()) === ''){
            setErrorFor($('#address'), 'Address cannot be blank')
        } else {
            setSuccessFor($('#address'));
            successCount++
        }

        if($.trim($('#dob').val()) === ''){
            setErrorFor($('#dob'), 'Date of Birth cannot be blank')
        } else {
            setSuccessFor($('#dob'));
            successCount++
        }

        if($.trim($('#phone').val()) === ''){
            setErrorFor($('#phone'), 'Phone number cannot be blank')
        } else if($.trim($('#phone').val()).length < 10){
            setErrorFor($('#phone'), 'Please enter a valid phone number')
        } else {
            setSuccessFor($('#phone'));
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

        if($.trim($('#password2').val()) === ''){
            setErrorFor($('#password2'), 'Please retype your password')
        } else if($.trim($('#password2').val()) !== $.trim($('#password').val())){
            setErrorFor($('#password2'), 'Password does not match')
        } else {
            setSuccessFor($('#password2'));
            successCount++
        }

        if(successCount === 9){
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

    $('#signUpForm').submit(function(e) {
        e.preventDefault();

        if(checkInputs() === true){
            $.ajax({
                type: "POST",
                url: 'controllers/c.signup.php',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response); 	
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        $('#registration_response_msg').html(resultData.message);
                        setTimeout("location.href = 'signin.php';",2000);
                    } else {
                        $('#registration_response_msg').html(resultData.message);
                        $('#registration_response_msg').toggleClass("text-danger")
                    }
                },
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