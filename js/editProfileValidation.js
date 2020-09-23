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

        if($.trim($('#phone').val()) === ''){
            setErrorFor($('#phone'), 'Phone number cannot be blank')
        } else if($.trim($('#phone').val()).length < 10){
            setErrorFor($('#phone'), 'Please enter a valid phone number')
        } else {
            setSuccessFor($('#phone'));
            successCount++
        }

        if($.trim($('#dlicense').val()) === ''){
            setErrorFor($('#dlicense'), 'Drivers license number cannot be blank')
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

        if(successCount === 7){
            valid = true;
        } else {
            valid = false;
        }

        return valid;

    }

    function checkPasswords(){
        let successCount = 0;
        let valid = false;

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

    $('#editProfileForm').submit(function(e) {
        e.preventDefault();

        if(checkInputs() === true){
            let action = 'update';
            $.ajax({
                type: "POST",
                url: 'controllers/c.edit_profile.php',
                data: $(this).serialize() + '&action=' + action,
                success: function(response) {
                    console.log(response);
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        $('.response').toggleClass('show bg-success');
                        $('#response_msg').html(resultData.message);
                        setTimeout("location.href = 'edit_profile.php';",2000);
                    } else {
                        $('.response').toggleClass('show bg-danger');
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

    $('#resetPasswordForm').submit(function(e) {
        e.preventDefault();

        if(checkPasswords() === true){
            let action = 'reset';
            $.ajax({
                type: "POST",
                url: 'controllers/c.edit_profile.php',
                data: $(this).serialize() + '&action=' + action ,
                success: function(response) {
                    console.log(response); 	
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        $('.response').toggleClass('show bg-success');
                        $('#response_msg2').html(resultData.message);
                        setTimeout("location.href = 'edit_profile.php';",2000);
                    } else {
                        $('.response').toggleClass('show bg-danger');
                        $('#response_msg2').html(resultData.message);
                        $('#response_msg2').toggleClass("text-danger")
                    }
                },
                error: function(response) {
                    console.log(response);
                    $('#response_msg2').html("Oops, something went wrong while processing this request. Try again later");
                }
            });
        } else {
            console.log('Did not pass the form validation')
        }
    });
});