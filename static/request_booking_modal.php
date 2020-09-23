<div class="modal" id="request" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Request Booking Date</h2>
            </div>
            <div class="response text-center p-2">
                <small id="response_msg" class="text-light"></small>
            </div>
            <div class="modal-body">
                <form method="post" id="bookingForm" action="controllers/c.request_booking.php">
                    <div class="row">
                        <input type="hidden" name="rego" value="<?php print $row['rego'] ?>">
                        <input type="hidden" name="email" value="<?php print $_SESSION['user'] ?>">
                        <div class="form-group col-6">
                            <label for="PickUpDate">Pick Up Date</label>
                            <input id="PickUpDate" class="form-control" type="date" name="PickUpDate">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="DropOffDate">Drop Off Date</label>
                            <input id="DropOffDate" class="form-control" type="date" name="DropOffDate">
                        </div>
                        <div class="btn-group col-12" role="group" aria-label="Button group">
                            <button class="btn btn-warning" type="submit" name="request">Request</button>
                        </div>
                        <div class="response text-center p-2">
                            <small id="response_msg" class="text-light"></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>