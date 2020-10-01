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
                                    <h1 class="h4 text-gray-900 mb-4">Add Visitor</h1>
                                </div>
                                <form class="user" action="#" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="usernamee" class="form-control form-control-user" placeholder="Enter Name...">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                    <label>Date</label>
                                        <input type="date" name="date" class="form-control form-control-user" placeholder="Enter Date of Visit">
                                    </div>
                                    <div class="form-group">
                                    <label>Time</label>
                                        <input type="time" name="time" class="form-control form-control-user" placeholder="Enter Time of Visit">
                                    </div>
                                    <div class="form-group">
                                        <label>No.of Visitors</label>
                                        <input type="number" name="no_of_visitor" class="form-control form-control-user" placeholder="Enter No.of Visitors">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Proof Photo</label>
                                        <input type="file" id="img" name="img" accept="image/*" class="form-control form-control-user" placeholder="Enter Photo">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Proof No.</label>
                                        <input type="text" name="Govt_ID" class="form-control form-control-user" placeholder="Enter ID No.">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" name="Phone_no" class="form-control form-control-user" placeholder="Enter Phone No.">
                                    </div>
                                    <div class="form-group">
                                        <label>Purpose Of Visit</label><br>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio" class="form-control form-control-user" name="optradio">Personal
                                        </label>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio"class="form-control form-control-user" name="optradio">Industrial
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Hospitality</label><br>
                                        <label class="radio-inline mr-3">
                                            <input type="radio" class="form-control form-control-user" name="optradio">Breakfast
                                        </label>
                                        <label class="radio-inline mr-3">
                                            <input type="radio" class="form-control form-control-user" name="optradio">Lunch
                                        </label>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio"class="form-control form-control-user" name="optradio">Dinner
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-custom form-toggle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="sr-only"> Toggle navigation</span>Conference Room 
                                        </button>
                                        
                                        <button class="btn btn-custom form-toggle" type="button" data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls=""> 
                                        <span class="sr-only"> Toggle navigation</span> None 
                                        </button>
                                        <hr>
                                        <div id="collapseExample" class="navbar-collapse collapse">
                                            <div class="pt-2">
                                                <form action="">
                                                    <div class="form-group">
                                                        <label>Room Name</label>
                                                        <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Purpose of Room</label>
                                                        <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Start Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>End Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="End Time" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"style="border-radius: 10rem;"> Book </button>
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
?>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>

    </html>

