<div class="modal" id="ResetPassword" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Reset Password</h2>
            </div>
            <div class="response text-center p-2">
                <small id="response_msg2" class="text-light"></small>
            </div>
            <div class="modal-body">
                <form method="post" id="resetPasswordForm" class="w-50 col-lg-6 offset-lg-3">
                    <input type="hidden" name="email" value="<?php print $_SESSION['user'] ?>">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                        <small>Error message</small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Your Password</label>
                        <input id="password2" class="form-control" type="password" name="password2">
                        <small>Error message</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="reset">
                            Reset
                        </button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>