<?php
session_start();
include('header_2.php'); 
include('navbar_2.php'); 
?>

<main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Leave Pass</h1>
                                </div>
                                <form class="user" action="#" method="POST">
                                    <div class="form-group">
                                        <label>Purpose of leave</label>
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="Purpose....">
                                    </div>
                                    <div class="form-group">
                                    <label>Date</label>
                                        <input type="date" name="date" class="form-control form-control-user" placeholder="Enter Date of Visit">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Start Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" required >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>End Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="End Time" required>
                                            </div>
                                        </div>
                                    </div>       
                                    <button type="submit" name="Submit_btn" class="btn btn-primary btn-user btn-block"style="border-radius: 10rem;"> Submit </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include('footer_2.php'); 
include('scripts_2.php'); 
?>


