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
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control form-control-user" 
                                        name="email"
                                        placeholder="Enter Email">
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
                                    <div class="form-group">
                                        <label>No.of Visitors</label>
                                        <input type="number" name="no_of_visitor" class="form-control form-control-user" 
                                        name="no_of_visitor"placeholder="Enter No.of Visitors">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Proof Photo</label>
                                        <input type="file" id="img" name="img" accept="image/*" class="form-control " placeholder="Photo"
                                        name="id_photo"
                                         style="border: none;">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Proof No.</label>
                                        <input type="text" name="Govt_ID" class="form-control form-control-user" 
                                        name="id_number"placeholder="Enter ID No.">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" name="Phone_no" class="form-control form-control-user"
                                        name="phone_no" placeholder="Enter Phone No.">
                                    </div>
                                    <div class="form-group">
                                        <label>Purpose Of Visit</label><br>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio" class="form-control form-control-user" name="purpose">Personal
                                        </label>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio"class="form-control form-control-user" name="purpose">Industrial
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Hospitality</label><br>
                                        <label class="radio-inline mr-3">
                                            <input type="radio" class="form-control form-control-user" name="hospitality">Breakfast
                                        </label>
                                        <label class="radio-inline mr-3">
                                            <input type="radio" class="form-control form-control-user" name="hospitality">Lunch
                                        </label>
                                        <label class="radio-inline  mr-3">
                                            <input type="radio"class="form-control form-control-user" name="hospitality">Dinner
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
                                                        <input type="text" class="form-control form-control-user" placeholder="
                                                        Enter Room Name" 
                                                        name="room_no"required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Purpose of Room</label>
                                                        <input type="text" class="form-control form-control-user" placeholder="Enter Purpose"
                                                        name="room_purpose" required>
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