<nav id="navbarid" class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
        <div class="navbar-brand navbar-nav">
            <a class="nav-link" href="index.php">Rent A Car</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-items">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-items">
            <?php
            if(empty($_SESSION['permission']) || $_SESSION['permission'] === 'C'):
            ?>
            <ul class="navbar-nav">
                <li class="nav-items">
                    <a href="index.php#footer" class="nav-link">Contact</a>
                </li>
            </ul>
            <p></p>
            <?php elseif(($_SESSION['permission']) === 'A') :?>

            <?php endif ?>
            <ul class="navbar-nav right">
                <?php
                if(empty($_SESSION['permission'])):
                ?>
                <li class="nav-items">
                    <a href="signup.php" class="nav-link" id="signUp">Sign up</a>
                </li>
                <li class="nav-items">
                    <a href="signin.php" class="nav-link" id="signIn">Sign in</a>
                </li>
                <?php else :?>
                    <?php if(($_SESSION['permission']) === 'A'): ?>
                        <div class="logout-btn">
                            <a href="controllers/c.logout.php" class="btn btn-danger">Log out</a>
                        </div>
                    <?php else: ?>
                    <div class="dropdown">
                    <button class="dropbtn">Profile</button>
                        <div class="dropdown-content">
                            <a href="edit_profile.php">Edit Profile</a>
                            <a href="booking_history.php">Booking Req History</a>
                            <a href="controllers/c.logout.php">Logout</a>
                        </div>
                    </div>
                    <?php endif ?>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>