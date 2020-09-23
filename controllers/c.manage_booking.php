<?php 
require_once('connect.php');
$table_name = 'booking';

if($_POST['action'] == 'accept'){
    $booking_id = $_POST['id'];
    acceptRequest($conn, $table_name, $booking_id);
}

if($_POST['action'] == 'reject'){
    $booking_id = $_POST['id'];
    rejectRequest($conn, $table_name, $booking_id);
}

function acceptRequest($conn, $table_name, $booking_id){
    $sql = "UPDATE " . $table_name . " SET bstatus = 'A' WHERE booking_id = '".$booking_id."'";
    $conn->query($sql);
}

function rejectRequest($conn, $table_name, $booking_id){
    $sql = "UPDATE " . $table_name . " SET bstatus = 'R' WHERE booking_id = '".$booking_id."'";
    $conn->query($sql);
}
?>