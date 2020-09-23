<?php 
require_once('connect.php');
$table_name = 'booking';

if(isset($_POST['request']) == 'booking'){
    $rego = $_POST['rego'];
    $email = $_POST['email'];
    $pick_up = $_POST['PickUpDate'];
    $drop_off = $_POST['DropOffDate'];
    $bstatus = 'P';
    $sql = "SELECT * from booking WHERE rego = '$rego' AND email = '$email' AND pick_up_date = '$pick_up'";
    
    if(checkIfExists($conn, $rego, $email, $pick_up) == true){
        $result = array(
            'result' => false,
            'message' => $email . ' you have made this request'
        );
        print json_encode($result);
    } else {
        requestBooking($conn, $table_name, $rego, $email, $pick_up, $drop_off, $bstatus);
    }

    $conn->close();
}

function checkIfExists($conn,$rego, $email, $pick_up){
    $exists = true;
    $sql = ("SELECT * from booking WHERE rego = '$rego' AND email = '$email' AND pick_up_date = '$pick_up'");
    if (mysqli_num_rows($conn->query($sql)) === 1){
        $exists = true;
    } else {
        $exists = false;
    }
    return $exists;
}

function requestBooking($conn, $table_name, $rego, $email, $pick_up, $drop_off, $bstatus){
    $sql = "INSERT INTO " . $table_name . " (rego, email, pick_up_date, drop_off_date, bstatus, booking_made)
    VALUES ('".$rego."', '".$email."', '".$pick_up."', '".$drop_off."', '".$bstatus."', CURRENT_TIMESTAMP())";

    if($conn->query($sql) === TRUE){
        $result = array(
            'result' => true,
            'message' => $email . ' succeed to book ' . $rego 
        );
        print json_encode($result);
    }else {
        $result = array(
            'result' => false,
            'message' => 'Booking failure, please try again later',
            'sql_error' => $conn->error
        );
        print json_encode($result);
    }
}
?>