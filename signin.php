<?php session_start()?>
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
                <h5>Sign in</h5>
            </div>
            <div class="form">
                <form method="post" id="signInForm" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email">
                        <small>Error message</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                        <small>Error message</small>
                    </div>
                    <div class="g-recaptcha mb-3" data-sitekey="YOUR_DATASITE_KEY" style="text-align: -webkit-center;"></div>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <button type="submit" class="btn btn-success outline">Sign in!</button>
                    </div>
                    <div class="col-12 p-2">
                        <small id="registration_response_msg" class="text-danger"></small>
                    </div>
                </form>
                <div><small>Don't have an account? <a href="signup.php">Sign up</a> Here</small></div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="card-footer">
            <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
        </div>
        <script src="js/signInFormValidation.js"></script>
    </footer>

</body>

</html>
