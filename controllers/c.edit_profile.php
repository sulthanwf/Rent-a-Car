<?php
    require_once('connect.php');
        $table_name = 'users';

    if($_POST['action'] == 'update'){
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname =$_POST['lastname'];
        $birth_date = $_POST['dob'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone'];
        $driver_license = $_POST['dlicense'];
        $action = $_POST['action'];
        
        updateInformation($conn, $table_name, $email, $firstname, $lastname, $birth_date, $address, $phone_no, $driver_license);
        $conn->close();
    }

    if($_POST['action'] === 'reset'){
        $email = $_POST['email'];
        $password = substr(md5($_POST['password']), 20); 

        resetPassword($conn, $table_name, $email, $password);
        $conn->close();
    }

    function updateInformation($conn, $table_name, $email, $firstname, $lastname, $birth_date, $address, $phone_no, $driver_license){
        $sql = "UPDATE " . $table_name . " SET
        email = '".$email."',
        fname = '".$firstname."',
        lname = '".$lastname."',
        date_of_birth = '".$birth_date."',
        address = '".$address."',
        phone_number = '".$phone_no."',
        drivers_license = '".$driver_license."'
        WHERE email = '".$email."'";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => 'Profile has been updated'
            );
            print json_encode($result);
        } else {
            $result = array(
                'result' => false,
                'message' => 'Update failed',
                'sql_error' => $conn->error
            );
            print json_encode($result);
        }
    }

    function resetPassword($conn, $table_name, $email, $password){
        $sql = "UPDATE " . $table_name . " SET password = '" . $password . "'
        WHERE email = '" . $email . "'";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => 'Password has been reset'
            );
            print json_encode($result);
        } else {
            $result = array(
                'result' => false,
                'message' => 'Password reset failed',
                'sql_error' => $conn->error . $sql
            );
            print json_encode($result);
        }
    }
?>