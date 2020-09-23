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

    <div class="background-block one">
        <h1>Explore New Zealand Your way</h1>
        <h5>With Rent A Car newest fleet,<br>You can explore New Zealand your way!</h5>
        <a href="search_car.php" class="btn btn-info outline">Search Available Car</a>
    </div>
    <div class="background-block two">
        <h5>Have bookings?<br>Manage your booking here</h5>
        <a href="booking_history.php" class="btn btn-info outline">Manage Booking</a>
    </div>
    <div class="background-block three">
        <h5>Sign up and be our member now!</h5>
        <a href="signup.php" class="btn btn-info outline">Sign up now!</a>
    </div>
    <footer id="footer">
        <?php include 'static/footer.php' ?>
        <script src="js/map.js"></script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY1mOXmSmTFuX_gp-_WjtSIOSsv4b_5J4&callback=initMap"></script>
        <script src="js/contactUsValidation.js"></script>
    </footer>

</body>

</html>