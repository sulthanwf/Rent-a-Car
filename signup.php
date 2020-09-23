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

    <div class="background-block signin">
        <div class="form container">
            <div class="form-title">
                <h5>Sign Up</h5>
            </div>
            <div class="form">
                <form method="post" id="signUpForm">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="text" name="email">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="firstname">First Name</label>
                            <input id="firstname" class="form-control" type="text" name="fname">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="lastname">Last Name</label>
                            <input id="lastname" class="form-control" type="text" name="lname">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="dob">Date of Birth</label>
                            <input id="dob" class="form-control" type="date" name="dob">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="address">Address</label>
                            <input id="address" class="form-control" type="city" name="address">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="phone">Phone No.</label>
                            <input id="phone" class="form-control" type="tel" name="phone">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="dlicense">Driver's License No.</label>
                            <input id="dlicense" class="form-control" type="text" name="dlicense">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="password2">Confirm Your Password</label>
                            <input id="password2" class="form-control" type="password" name="password2">
                            <small>Error message</small>
                        </div>
                        <div class="btn-group col-12 px-3" role="group" aria-label="Button group">
                            <button type="submit" class="btn btn-success outline">Sign Up!</button>
                        </div>
                        <div class="col-12"><p id="registration_response_msg"></p></div>
                    </div>
                </form>
                <div><small>Already have an account? <a href="signin.php">Sign in</a> Here</small></div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="card-footer">
            <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
        </div>
        <script src="js/signUpFormValidation.js"></script>
        <script src="js/dateValidation.js"></script>
    </footer>

</body>

</html>