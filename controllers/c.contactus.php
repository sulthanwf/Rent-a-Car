<?php
    require_once('connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $message = $_POST['message'];
        $table_name = 'message';

        $sql = "INSERT INTO " . $table_name . " (email, message)
        VALUES ('".$email."','".$message."')";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => 'Hi ' . $email . ' your message has been sent. Thank you!'
            );
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Message failed to send' . $sql,
                'sql_error' => $conn->error
            );
            print json_encode($result);
        }
            $conn->close();
        
    }
?>