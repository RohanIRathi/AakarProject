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
                                <form class="user" method="POST" enctype="multipart/form-data">
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
                                                <label>Phone No.</label>
                                                <input type="text" name="Phone_no" class="form-control form-control-user" placeholder="Enter Phone No.">
                                            </div>
                                        </div>
                                        
                                    </div> 
                                    <div class="row">
                                    <div class="col">
                                            <div class="form-group pb-2">
                                                <label>ID Proof Photo</label>
                                                <input type="file" id="img" name="img" accept="image/*" class="form-control " placeholder="Photo" style="border: none;">
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
                                        
                                        <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="" id="checkbox">Conference Room 
                                        </label>
                                        </div>
                                        <hr>
                                        <div id="collapseExample" class="navbar-collapse collapse">
                                            <div class="pt-2">
                                            <form method="POST">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Room Name</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" >
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Purpose of Room</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Start Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" name="start_time" >
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>End Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="End Time" name="end_time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                   
                                    <button type="submit" name="add_btn" class="btn btn-primary btn-user btn-block" style="border-radius: 10rem;">Add</button>                                
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
<!--
      
    <p><input type="checkbox" name="active" id="active" value="1" /> conference book</p>
    
    <div id="active_sub">
        <div id="collapseExample" class="navbar-collapse collapse">
                                            <div class="pt-2">
                                            <form method="POST">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Room Name</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" >
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Purpose of Room</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Start Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" name="start_time" >
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>End Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="End Time" name="end_time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
    </div>
    
<script type="text/javascript">
document.getElementById('active').onclick = function() {
    // call toggleSub when checkbox clicked
    // toggleSub args: checkbox clicked on (this), id of element to show/hide
    toggleSub(this, 'active_sub');
};

// called onclick of checkbox
function toggleSub(box, id) {
    // get reference to related content to display/hide
    var el = document.getElementById(id);
    
    if ( box.checked ) {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}
</script>