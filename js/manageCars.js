$(document).ready(function() {
    function checkInputs(){
        let successCount = 0;
        let valid = false;
        
        if($.trim($('#rego').val()) === ''){
            setErrorFor($('#rego'), 'Registration number cannot be blank')
        } else {
            setSuccessFor($('#rego'));
            successCount++
        }

        if($.trim($('#manufacturer').val()) === ''){
            setErrorFor($('#manufacturer'), 'Manufacturer name cannot be blank')
        } else {
            setSuccessFor($('#manufacturer'));
            successCount++
        }

        if($.trim($('#cmodel').val()) === ''){
            setErrorFor($('#cmodel'), 'Car model cannot be blank')
        } else {
            setSuccessFor($('#cmodel'));
            successCount++
        }
        
        if($.trim($('#ymanufactured').val()) === ''){
            setErrorFor($('#ymanufactured'), 'Year manufactured cannot be blank')
        } else {
            setSuccessFor($('#ymanufactured'));
            successCount++
        }   

        if($.trim($('#ctype').val()) === ''){
            setErrorFor($('#ctype'), 'Year manufactured cannot be blank')
        } else {
            setSuccessFor($('#ctype'));
            successCount++
        }

        if($.trim($('#fee').val()) === ''){
            setErrorFor($('#fee'), 'Fee cannot be blank')
        } else {
            setSuccessFor($('#fee'));
            successCount++
        }

        if($.trim($('#image').val()) === ''){
            setErrorFor($('#image'), 'Image cannot be blank')
        } else {
            setSuccessFor($('#image'));
            successCount++
        }


        if(successCount === 7){
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

    $('#addCarForm').submit(function(e) {
        e.preventDefault();

        if(checkInputs() === true){
            $("#image").change(function fileName() {
                const filename = this.files[0].name
                return filename;
            });
            let action = 'add';
            var filename = $('input[type=file]').val().split('\\').pop();
            $.ajax({
                type: "POST",
                url: 'controllers/c.manage_cars.php',
                data: $(this).serialize() + '&image=' + filename + '&action=' + action,
                success: function(response) {
                    console.log(response); 	
                    var resultData = JSON.parse(response);
                    if (resultData.result == true) {
                        $('#registration_response_msg').html(resultData.message);
                        $('.table').load('manage_cars.php .table');
                        $('.modal').removeClass('show');
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

jQuery(document).on('click', '.delete-car', function(){
    const email = $(this).parents("tr").attr("id");
    deleteUsers(email);

    function deleteUsers(email){
        if(confirm('Are you sure to remove this record ?')){
            $.ajax({
               url: 'controllers/c.manage_cars.php',
               type: 'GET',
               data: {id: email},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(response) {
                   console.log(response);
                    $('.table').load('manage_cars.php .table');
                    alert("Record removed successfully");  
               }
            });
        }
    }
});