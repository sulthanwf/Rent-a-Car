<?php session_start();
require_once('controllers/connect.php');
$row = searchCar($conn)->fetch_assoc();
$count = countAvailableCar($conn, $row['car_model'])->fetch_assoc();
?>
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
    <?php include 'static/request_booking_modal.php' ?>
    
    <div class="container-fluid">
            <div class="header-gap"></div>
            <div class="title"><h1 class="text-center"><?php print $row['manufacturer'] . ' ' . $row['car_model'] ?></h1></div>
            <div class="container-car mb-5">
                <div class="border border-info">
                    <div class="row">
                        <div class="col-6"><img src="content/img/<?php print $row['image'] ?>" alt="" class="w-100 p-3"></div>
                        <div class="col-6">
                            <div class="car-info">
                            <h4 class="text-center">Type: <?php print $row['car_type'] ?></h4>
                            <h4 class="text-center">Year: <?php print $row['year_manufactured'] ?></h4>
                            <h4 class="text-center">Fee: $<?php print $row['rent_fee'] ?>/Day</h4>
                            <h4 class="text-center">Available: <?php print $count['available'] ?></h4>
                            <?php if(empty($_SESSION['permission'])): ?>
                                <h5 class="text-center text-danger">Log in to book your car!</h5>
                            <?php else: ?>
                                <div class="text-center">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#request">Request a Booking</button>
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <footer id="footer">
        <div class="card-footer">
            <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
        </div>
        <script src="js/dateValidation.js"></script>
        <script src="js/searchCarValidation.js"></script>
    </footer>

</body>

</html>
<?php 
function searchCar($conn){
    $sql = "SELECT * FROM car WHERE rego = '" . $_GET['car'] . "'";
    $result = $conn->query($sql);
    
    return $result;
    $conn->close();
}
function countAvailableCar($conn,$car_model){
    $sql = "SELECT count(*) AS available FROM car WHERE car_model = '".$car_model."' and booked = 0";
    $result = $conn->query($sql);
    
    return $result;
    $conn->close();
}
?>