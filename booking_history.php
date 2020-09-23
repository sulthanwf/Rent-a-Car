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
    <div class="header-gap"></div>
    <div class="row">
        <input type="hidden" id="session" value="<?php print $_SESSION['permission'] ?>">
        </div>
        <div class="col-12">
            <div class="container admin">
                <div class="table-top">
                    <h1>Booking Request History</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Rego</th>
                            <th>Pick Up Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once('controllers/connect.php');
                        $result = $conn->query("SELECT * FROM booking WHERE email = '".$_SESSION['user']."'") or die($conn->error);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr id="<?php print $row['booking_id']?>">
                            <td><?php print $row['booking_id'] ?></td>
                            <td><?php print $row['rego'] ?></td>
                            <td><?php print $row['pick_up_date'] ?></td>
                            <td><?php print $row['bstatus'] ?></td>
                        </tr>
                        <?php 
                        endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="card-footer">
            <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
        </div>
        <script src="js/sessionValidation.js"></script>
        <script src="js/manageCars.js"></script>
    </footer>

</body>

</html>