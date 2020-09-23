<?php
    require_once('connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $firstname = $_POST['fname'];
        $lastname =$_POST['lname'];
        $password = substr(md5($_POST['password']), 20); 
        $user_type = 'C';
        $birth_date = $_POST['dob'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone'];
        $driver_license = $_POST['dlicense'];
        $table_name = 'users';

        
        
        if(checkIfExists($conn, $email) == true){
            $result = array(
                'result' => false,
                'message' => 'Hi, ' . $email . ' is already registered in the system'
            );
            print json_encode($result);
        } else {
            insertNewCustomer($conn, $table_name, $email, $firstname, $lastname, $password, $birth_date, $address, $phone_no, $driver_license, $user_type);
        }
            $conn->close();
    }

    function checkIfExists($conn, $email){
        $exists = true;
        $sql = ("SELECT * from users WHERE email = '$email' LIMIT 1");
        if (mysqli_num_rows($conn->query($sql)) === 1){
            $exists = true;
        } else {
            $exists = false;
        }
        return $exists;
    }

    function insertNewCustomer($conn, $table_name, $email, $firstname, $lastname, $password, $birth_date, $address, $phone_no, $driver_license, $user_type){
        $sql = "INSERT INTO " . $table_name . " (email, fname, lname, password, date_of_birth, address, phone_number, drivers_license, user_type)
        VALUES ('".$email."','".$firstname."','".$lastname."','".$password."','".$birth_date."','".$address."','".$phone_no."', '".$driver_license."', '".$user_type."')";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => 'Hi ' . $firstname . ' ' .$lastname. ' your registration is successful'
            );
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Registration failure, please try again later',
                'sql_error' => $conn->error
            );
            print json_encode($result);
        }
    }
?>