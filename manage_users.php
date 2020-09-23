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
    <?php include 'static/add_user_modal.html' ?>

    <div class="row">
        <input type="hidden" id="session" value="<?php print $_SESSION['permission'] ?>">
        <div class="col-2">
            <?php include 'static/sidebar.html' ?>
            <?php include 'static/footer.php' ?>
        </div>
        <div class="col-10">
            <div class="container admin">
                <div class="table-top">
                    <h1>Manage Users</h1>
                    <button type="button" class="btn btn-success add" data-toggle="modal" data-target="#AddUser">Add User</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Driver's License</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once('controllers/connect.php');
                        $rownum = 1;
                        $result = $conn->query("SELECT * FROM users") or die($conn->error);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr id="<?php print $row['email']?>">
                            <td><?php print $row['email'] ?></td>
                            <td><?php print $row['drivers_license'] ?>  </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#UpdateUser<?php print $rownum; ?>">Edit</button>
                                    <button class="btn btn-danger delete-user">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        include 'static/edit_user_modal.php';
                        $rownum++;
                        endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="footer">
        <script src="js/sessionValidation.js"></script>
        <script src="js/manageUsers.js"></script>
        <script src="js/dateValidation.js"></script>
    </footer>

</body>

</html>