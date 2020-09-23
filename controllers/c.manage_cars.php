<?php 
require_once('connect.php');
$table_name = 'car';

    if(isset($_POST['action']) == 'add'){
        $rego = $_POST['rego'];
        $manufacturer = $_POST['manufacturer'];
        $car_model = $_POST['cmodel'];
        $year = $_POST['ymanufactured'];
        $car_type = $_POST['ctype'];
        $fee = $_POST['fee'];
        $image = $_POST['image'];

        if(checkIfExists($conn, $rego) == true){
            $result = array(
                'result' => false,
                'message' => $rego . ' is already registered in the system'
            );
            print json_encode($result);
        } else {
            addCar($conn, $table_name, $rego, $manufacturer, $car_model, $year, $car_type, $fee, $image);
        }
            $conn->close();
    }

    if(isset($_POST['save'])){
        $rego = $_POST['rego'];
        $manufacturer = $_POST['manufacturer'];
        $car_model = $_POST['cmodel'];
        $year = $_POST['ymanufactured'];
        $car_type = $_POST['ctype'];
        $fee = $_POST['fee'];

        updateCar($conn, $table_name, $rego, $manufacturer, $car_model, $year, $car_type, $fee);

        $conn->close();
        header('location: ../manage_cars.php');
    }

    if(isset($_GET['id'])){
        $rego = $_GET['id'];
        $sql = "DELETE FROM ".$table_name." WHERE rego = '".$rego."'";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => $sql
            );
        } else {
            $result = array(
                'result' => true,
                'message' => $sql,
                'sql_error' => $conn->error
            );
        }
        // $conn->query($sql) or die($conn->error);

        $conn->close();
    }

    function checkIfExists($conn, $rego){
        $exists = true;
        $sql = ("SELECT * from car WHERE rego = '$rego' LIMIT 1");
        if (mysqli_num_rows($conn->query($sql)) === 1){
            $exists = true;
        } else {
            $exists = false;
        }
        return $exists;
    }

    function addCar($conn, $table_name, $rego, $manufacturer, $car_model, $year, $car_type, $fee, $image){
        $sql = "INSERT INTO ".$table_name." (rego, manufacturer, car_model, year_manufactured, car_type, rent_fee, image) 
        VALUES ('".$rego."','".$manufacturer."','".$car_model."','".$year."',
        '".$car_type."',".$fee.",'".$image."')";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => $rego. '\'s registration is successful'
            );
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Registration failure, please try again later',
                'sql_error' => $conn->error . $sql
            );
            print json_encode($result);
        }
    }

    function updateCar($conn, $table_name, $rego, $manufacturer, $car_model, $year, $car_type, $fee){
        $sql = "UPDATE " . $table_name . " SET 
        manufacturer = '".$manufacturer."',
        car_model = '".$car_model."',
        year_manufactured = '".$year."',
        car_type = '".$car_type."',
        rent_fee = '".$fee."'
        WHERE rego = '".$rego."'";

        if($conn->query($sql) === TRUE){
            $result = array(
                'result' => true,
                'message' => $rego. '\'s update is successful'
            );
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Update failure, please try again later',
                'sql_error' => $conn->error . $sql
            );
            print json_encode($result);
        }
    }

?>