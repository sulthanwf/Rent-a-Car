<?php
    require_once('connect.php');

    $table_name = 'users';

    if(isset($_POST['action']) == 'add'){
        $email = $_POST['email'];
        $firstname = $_POST['fname'];
        $lastname =$_POST['lname'];
        $password = substr(md5($_POST['password']), 20); 
        $user_type = 'C';
        $birth_date = $_POST['dob'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone'];
        $driver_license = $_POST['dlicense'];

        if(checkIfExists($conn, $email) == true){
            $result = array(
                'result' => false,
                'message' => $email . ' is already registered in the system'
            );
            print json_encode($result);
        } else {
            insertNewCustomer($conn, $table_name, $email, $firstname, $lastname, $password, $birth_date, $address, $phone_no, $driver_license, $user_type);
        }
            $conn->close();
    }

    if(isset($_POST['save'])){
        $email = $_POST['email'];
        $firstname = $_POST['fname'];
        $lastname =$_POST['lname'];
        $birth_date = $_POST['dob'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone'];
        $driver_license = $_POST['dlicense'];

        updateUser($conn, $table_name, $email, $firstname, $lastname, $birth_date, $phone_no, $driver_license);

        $conn->close();
        header('location: ../manage_users.php');
    }

    if(isset($_GET['id'])){
        $email = $_GET['id'];
        $sql = "DELETE FROM ".$table_name." WHERE email = '".$email."'";

        $conn->query($sql) or die($conn->error);

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
                'message' => $firstname . ' ' .$lastname. '\'s registration is successful'
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

    function updateUser($conn, $table_name, $email, $firstname, $lastname, $birthdate, $phone_no, $driver_license){
        $sql = "UPDATE " . $table_name . " SET
        fname = '".$firstname."',
        lname = '".$lastname."',
        date_of_birth = '".$birthdate."',
        phone_number = '".$phone_no."',
        drivers_license = '".$driver_license."'
        WHERE email = '".$email."'";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => $firstname . ' ' .$lastname. ' info has been updated' . $sql
            );
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Update failed, please try again later',
                'sql_error' => $conn->error
            );
            print json_encode($result);
        }
    }
?>