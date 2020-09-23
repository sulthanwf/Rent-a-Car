<?php
    require_once('connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = substr(md5($_POST['password']), 20); 
    
        $sql = ("SELECT * from users WHERE email = '$email' AND password = '$password' LIMIT 1");
        if(mysqli_num_rows($conn->query($sql)) === 1){   
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();   
            session_start();
            if (isset($row['user_type'])) {
                $_SESSION['permission'] = $row['user_type'];
                $_SESSION['user'] = $email;
                $result = array(
                    'result' => true,
                    'message' => 'You are logged in'
                );
            }
            print json_encode($result);
        }else {
            $result = array(
                'result' => false,
                'message' => 'Your email and password is invalid',
            );
            print json_encode($result);
        }
            $conn->close();
        
    }
?>