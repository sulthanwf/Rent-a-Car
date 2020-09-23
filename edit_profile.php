<?php session_start(); ?>
<html>

<head>
    <?php
    include 'static/extlib.html';
    include 'static/font.html';
    ?>
</head>

<body>
    <header>
        <?php include 'static/header.php'; ?>
    </header>
    <?php include 'static/reset_password_modal.php' ?>
    
    <div class="header-gap"></div>
    <div class="response text-center p-2">
        <small id="response_msg" class="text-light"></small>
    </div>
    <div class="title"><h1 class="text-center">Edit Profile</h1></div>
    <?php 
    require_once('controllers/connect.php');
    $sql = "SELECT * FROM users WHERE email = '" . $_SESSION['user'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="container profile">
        <form method="POST" id="editProfileForm">
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="text" name="email" value="<?php print $row['email'] ?>">
            </div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input id="firstname" class="form-control" type="text" name="firstname" value="<?php print $row['fname'] ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input id="lastname" class="form-control" type="text" name="lastname" value="<?php print $row['lname'] ?>">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input id="dob" class="form-control" type="date" name="dob" value="<?php print $row['date_of_birth'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" class="form-control" type="city" name="address" value="<?php print $row['address'] ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone No.</label>
                <input id="phone" class="form-control" type="tel" name="phone" value="<?php print $row['phone_number'] ?>">
            </div>
            <div class="form-group">
                <label for="dlicense">Driver's License No.</label>
                <input id="dlicense" class="form-control" type="text" name="dlicense" value="<?php print $row['drivers_license'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <button id="resetPassword" class="btn btn-warning w-100" type="button" data-toggle="modal" data-target="#ResetPassword">Reset Password</button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mx-1" name="save">Update</button>
                <a href="index.php" class="btn btn-danger mx-1">Back to Home</a>
            </div>
        </form>
    </div>

    <footer id="footer">
        <script src="js/dateValidation.js"></script>
        <script src="js/editProfileValidation.js"></script>
    </footer>

</body>

</html>