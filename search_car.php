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
    
    <div class="container-fluid">
            <div class="header-gap"></div>
            <div class="title"><h1 class="text-center">Available Cars</h1></div>
            <div class="container-car">
                <div class="row p-5">
                <?php 
                require_once('controllers/connect.php');
                $sql = "SELECT * FROM car WHERE booked = 0 GROUP BY car_model";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                <div class="col-4 border border-info">
                    <a href="car.php?car=<?php print $row['rego'] ?>" name="submit"><img src="content/img/<?php print $row['image'] ?>" alt="" class="w-100 p-3"></a>
                    <h3 class="text-center"><?php print $row['manufacturer'] . ' ' . $row['car_model'] ?></h3>
                </div>
                <?php endwhile ?>
                </div>
            </div>
        </div>
    <footer id="footer">
        <div class="card-footer">
            <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
        </div>
    </footer>

</body>

</html>