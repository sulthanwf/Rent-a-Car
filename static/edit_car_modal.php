<div class="modal" id="UpdateCar<?php print $rownum; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Car</h2>
            </div>
            <div class="modal-body">
                <form method="post" action="controllers/c.manage_cars.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="rego">Registration Number</label>
                            <input class="form-control" type="text" name="rego" value="<?php print $row['rego'] ?>">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="manufacturer">Manufacturer Name</label>
                            <input class="form-control" type="text" name="manufacturer" value="<?php print $row['manufacturer'] ?>"> 
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="cmodel">Car Model</label>
                            <input class="form-control" type="text" name="cmodel" value="<?php print $row['car_model'] ?>">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="ymanufactured">Year</label>
                            <input class="form-control" type="number" min="1900" name="ymanufactured" value="<?php print $row['year_manufactured'] ?>">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="ctype">Car Type</label>
                            <input class="form-control" type="city" name="ctype" value="<?php print $row['car_type'] ?>">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="fee">Fee</label>
                            <input class="form-control" type="text" name="fee" value="<?php print $row['rent_fee'] ?>">
                            <small>Error message</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="image">Change Image</label>
                            <input class="form-control-file" type="file" name="image">
                            <small>Error message</small>
                        </div>
                        <div class="btn-group col-12 px-3" role="group" aria-label="Button group">
                            <button type="submit" class="btn btn-success outline" name="save">Save</button>
                            <button class="btn btn-danger" data-dismiss="modal">Discard</button>
                        </div>
                        <div class="col-12"><p id="registration_response_msg"></p></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>