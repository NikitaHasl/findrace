<!-- Profile Settings-->
<div class="col-lg-8 pb-5">
    <form class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-fn">First Name</label>
                <input class="form-control" type="text" id="account-fn" value="Daniel" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-ln">Last Name</label>
                <input class="form-control" type="text" id="account-ln" value="Adams" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-email">E-mail Address</label>
                <input class="form-control" type="email" id="account-email" value="daniel.adams@example.com" disabled="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-phone">Phone Number</label>
                <input class="form-control" type="text" id="account-phone" value="+7 (805) 348 95 72" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-pass">New Password</label>
                <input class="form-control" type="password" id="account-pass">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="account-confirm-pass">Confirm Password</label>
                <input class="form-control" type="password" id="account-confirm-pass">
            </div>
        </div>
        <div class="col-12">
            <hr class="mt-2 mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="custom-control custom-checkbox d-block">
                    <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                    <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
                </div>
                <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
            </div>
        </div>
    </form>
</div>