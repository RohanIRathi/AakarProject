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
                                    <h1 class="h4 text-gray-900 mb-4">Add Visitor</h1>
                                </div>
                                <form class="user" method="post" enctype="multipart/form-data">
                                   <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>First Name</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Enter First Name"
                                                name="first_name" required >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control form-control-user" placeholder="Enter Last Name" 
                                                name="last_name"required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>No.of Visitors</label>
                                                <input type="number" name="no_of_visitor" class="form-control form-control-user" placeholder="Enter No.of Visitors">
                                            </div>
                                        </div>
                                    </div>       
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Date</label>
                                                <input type="date" class="form-control form-control-user" placeholder="Enter Date" 
                                                name="date"required >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="Enter Time" 
                                                name="time"required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>ID Proof No.</label>
                                                <input type="text" name="Govt_ID" class="form-control form-control-user" placeholder="Enter ID No.">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>ID Proof Photo</label>
                                                <input type="file" id="img" name="img" accept="image/*" class="form-control " placeholder="Photo" style="border: none;">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Phone No.</label>
                                                <input type="text" name="Phone_no" class="form-control form-control-user" placeholder="Enter Phone No.">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Purpose Of Visit</label><br>
                                                <label class="radio-inline  mr-3">
                                                    <input type="radio" class="form-control form-control-user" name="optradio">Personal
                                                </label>
                                                <label class="radio-inline  mr-3">
                                                    <input type="radio"class="form-control form-control-user" name="optradio">Industrial
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Hospitality</label><br>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" class="form-control form-control-user" name="optradio1">Breakfast
                                                </label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" class="form-control form-control-user" name="optradio1">Lunch
                                                </label>
                                                <label class="radio-inline  mr-3">
                                                    <input type="radio"class="form-control form-control-user" name="optradio1">Dinner
                                                </label>
                                            </div>
                                        </div>
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
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Room Name</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Purpose of Room</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Start Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" name="start_time" required>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>End Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="End Time" name="end_time"required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="add_btn" value="Add" class="btn btn-primary btn-user btn-block" style="border-radius: 10rem;">                                    
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