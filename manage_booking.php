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
    <?php include 'static/add_car_modal.html' ?>

    <div class="row">
        <input type="hidden" id="session" value="<?php print $_SESSION['permission'] ?>">
        <div class="col-2">
        <?php include 'static/sidebar.html' ?>
        <?php include 'static/footer.php' ?>
        </div>
        <div class="col-10">
            <div class="container admin">
                <div class="table-top">
                    <h1>Manage Booking</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rego</th>
                            <th>Booking Time</th>
                            <th>Pick Up Date</th>
                            <th>Drop Off Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once('controllers/connect.php');
                        $rownum = 1;
                        $result = $conn->query("SELECT * FROM booking WHERE bstatus = 'P'") or die($conn->error);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr id="<?php print $row['booking_id']?>">
                            <td><?php print $rownum ?></td>
                            <td><?php print $row['rego']?></td>
                            <td><?php print $row['booking_made']?></td>
                            <td><?php print $row['pick_up_date']?></td>
                            <td><?php print $row['drop_off_date']?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <button class="btn btn-success accept">Accept</button>
                                    <button class="btn btn-danger reject">Reject</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $rownum++;
                        endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="footer">
        <script src="js/sessionValidation.js"></script>
        <script src="js/manageBooking.js"></script>
    </footer>

</body>

</html>