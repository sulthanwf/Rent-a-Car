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
            successCount++;
        }

        if(successCount == 1){
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

    $('#contactUsForm').submit(function(e) {
        //The below line prevents the data from being sent to the server for full refresh
        e.preventDefault();

        checkInputs();

        //do Javascript validation here
        //and if all validation criteria is successful then call ajax
        //else display validation error messages on form

        if(checkInputs()===true){
            $.ajax({
                type: "POST",
                url: 'controllers/c.contactus.php',
                //dataType: "json",
                //The below serializes your form's data and puts it into the POST global variable
                data: $(this).serialize(),
    
                //AJAX calls are basically a PROMISE in JAVASCRIPT
                // PROMISE - if you meet conditions then you return something
                // Not that something is a success
                //Also if you do not meet conditions you return an error
                //Success and error only happen after processing is done on the server
                success: function(response) {
                    console.log(response); //this will print the partial response returned by server on console
                    // the typeof operator is the javascript way to identify datatype		
                    console.log(typeof response); // this will print string on console window
                    var resultData = JSON.parse(response); // this converts the string into a proper json object
                    if (resultData.result == true) {
                        $('#response_msg').html(resultData.message);
                        setTimeout("location.href = 'index.php';",3500);
                        //location.href = 'my_profile.php';
                    } else {
                        $('#response_msg').html(resultData.message);
                        /* // Normal javascript will be something like this:
                        var response_msg = document.getElementById('registration_response_msg);
                        response_msg.innerHTML = resultData.message;
                        */
                    }
                },
                // This error is a runtime exception
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