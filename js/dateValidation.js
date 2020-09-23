$(document).ready(function(){
    var today = new Date();
    
    var month = today.getMonth() + 1;
    var day = today.getDate()+1;
    var year = today.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#PickUpDate').attr('min', maxDate);


    $('#PickUpDate').change( function(){
        let chosenDate = new Date($('#PickUpDate').val());
        let milliseconds = chosenDate.setTime(chosenDate.getTime() + 1000 * 60 * 60 * 24);
        chosenDate = new Date(milliseconds);
        var month = chosenDate.getMonth() + 1;
        var day = chosenDate.getDate();
        var year = chosenDate.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#DropOffDate').attr('min', maxDate);
        $('#DropOffDate').attr('value', maxDate);
    });
});



$(document).ready(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear()-18;
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#dob').attr('max', maxDate);
});