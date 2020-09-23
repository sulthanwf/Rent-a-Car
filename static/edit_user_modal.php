<div class="modal" id="UpdateUser<?php print $rownum; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit User</h2>
            </div>
            <div class="modal-body">
                <form method="post" action="controllers/c.manage_users.php">
                    <div class="row">
                    <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" value="<?php print $row['email'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="firstname">First Name</label>
                            <input class="form-control" type="text" name="fname" value="<?php print $row['fname'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="<?php print $row['lname'] ?>"> 
                        </div>
                        <div class="form-group col-6">
                            <label for="dob">Date of Birth</label>
                            <input class="form-control" type="date" name="dob" value="<?php print $row['date_of_birth'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="address">Address</label>
                            <input class="form-control" type="city" name="address" value="<?php print $row['address'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="phone">Phone No.</label>
                            <input class="form-control" type="tel" name="phone" value="<?php print $row['phone_number'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="dlicense">Driver's License No.</label>
                            <input class="form-control" type="text" name="dlicense" value="<?php print $row['drivers_license'] ?>"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="save">Save</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>