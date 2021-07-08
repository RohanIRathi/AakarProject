<?php
    
?>

<main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="password" name="old_pass" class="form-control form-control-user" placeholder="Enter Old Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_pass" class="form-control form-control-user" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="renew_pass" class="form-control form-control-user" placeholder="Re-enter New Password" required>
                                        </div>
                                        <input type="submit" name="reset_btn" class="btn btn-primary btn-user btn-block" value='UPDATE'>  
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>