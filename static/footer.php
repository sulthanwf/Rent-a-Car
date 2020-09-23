<?php
if(empty($_SESSION['permission']) || $_SESSION['permission'] === 'C'):
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div>
                    <h5 class="card-title">Contact Us</h5>
                    <p class="card-text">
                    <address>
                        20 Hobson Street, Auckland 1010<br>
                        Monday - Sunday 9am to 5pm<br>
                        rentacar@gmail.com<br>
                        028 425 5214
                    </address>
                    </p>
                </div>
                <div>
                    <form method="post" id="contactUsForm">
                        <?php
                        if(empty($_SESSION['permission'])):
                        ?>
                        <h5>Got something you want to say to us?</h5>
                        <div class="form-group" id="email-field">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="Enter your email">
                            <small>Error message</small>
                        </div>
                        <?php else :?>
                        <h5>Feedback</h5>
                        <div class="form-group" id="email-field">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php print $_SESSION['user'] ?>">
                            <small>Error message</small>
                        </div>
                        <?php endif ?>

                        <div class="form-group">
                            <label for="message">Your message</label>
                            <textarea id="message" class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <div class="btn-group col-12" role="group" aria-label="Button group">
                        <?php
                        if(empty($_SESSION['permission'])):
                        ?>
                        <button type="submit" class="btn btn-success outline">Send Message</button>
                        <?php else :?>
                        <button type="submit" class="btn btn-success outline">Send Feedback</button>
                        <?php endif ?>
                        </div>
                        <div class="col-12"><small id="response_msg"></small></div>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <h3>Location</h3>
                <!--The div element for the map -->
                <div id="map"></div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
    </div>
</div>
<?php else :?>
<div class="card-footer">
    <h5>Rent A Car <i class="fa fa-copyright"></i></h5>
</div>
<?php endif ?>