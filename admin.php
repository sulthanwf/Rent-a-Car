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

    <div class="row">
        <input type="hidden" id="session" value="<?php print $_SESSION['permission'] ?>">
        <div class="col-2"><?php include 'static/sidebar.html' ?></div>
        <div class="col-10">
            <div class="container admin">
                <h1>Welcome Home Admin</h1>
                <h5>With Rent A Car newest fleet,<br>You can explore New Zealand your way!</h5>
            </div>
        </div>
    </div>
    <footer id="footer">
        <?php include 'static/footer.php' ?>
        <script src="js/sessionValidation.js"></script>
    </footer>

</body>

</html>