$(document).ready(function(){
    if($('#session').val() === 'A'){
        $('#navbarid').toggleClass('admin');
    }else {
        console.log('Failed');
    }
});