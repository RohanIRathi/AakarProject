<?php
    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');

    $mysqli = connectionToDB($host, $username, $pass, $db);

    if(!empty($_POST["add_btn"])) {
        $first_name = $mysqli -> real_escape_string($_POST['first_name']);
        $last_name = $mysqli -> real_escape_string($_POST['last_name']);
        $email = $mysqli -> real_escape_string($_POST['email']);
        $date = $mysqli -> real_escape_string($_POST['date']);
        $time = $mysqli -> real_escape_string($_POST['time']);
        $no_of_visitors = $mysqli -> real_escape_string($_POST['no_of_visitor']);
        $id_photo = $mysqli -> real_escape_string($_POST['id_photo']);
        $id_number = $mysqli -> real_escape_string($_POST['id_number']);
        $phone_no = $mysqli -> real_escape_string($_POST['phone_no']);
        $purpose = $mysqli -> real_escape_string($_POST['purpose']);
        $hospitality = $mysqli -> real_escape_string($_POST['hospitality']);
        if(!empty($_POST['conference']))
        {
            $conference = 'TRUE';
            $room_no = $mysqli -> real_escape_string($_POST['room_no']);
            $room_purpose = $mysqli -> real_escape_string($_POST['room_purpose']);
            $start_time = $mysqli -> real_escape_string($_POST['start_time']);
            $end_time = $mysqli -> real_escape_string($_POST['end_time']);
        }
        else
        {
            $conference = 'FALSE';
            $room_no = null;
            $room_purpose = null;
            $start_time = null;
            $end_time = null;
        }


        $query = "INSERT INTO `visitor`( `first_name`, `last_name`, `email`, `purpose`, `time`, `noofvisitors`, `photo_id_no`, `hospitality`, `conference`, `conference_room`, `room_purpose`, `start_time`, `end_time`, `visitee`) VALUES ($first_name,$last_name,$email,$purpose,$time,$no_of_visitor,$id_number,$hospitality,'0',$room_no,$room_purpose,$start_time,$end_time,'')";

    	$result = mysql_query($mysqli,$query);
    	if ($result == TRUE){
    		echo "Data Inserted!";
    	}
    	else{
    		echo "Data Not Inserted";
    	}
    }

?>
<?php
session_start();
include('header_1.php'); 
include('navbar_1.php'); 
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
                                                <label>Phone No.</label>
                                                <input type="text" name="phone_no" class="form-control form-control-user" placeholder="Enter Phone No.">
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
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label for="employee">Employee to visit:</label>
                                            </div>
                                        </div>   
                                        <div class="col">   
                                            <div class="form-group pb-2">  
                                            <select id="employee"  name="option" class="form-control" placeholder='Choose employee' >
                                                <option>Employee 1</option>
                                                <option>Employee 2</option>
                                                <option>Employee 3</option>
                                                <option>Employee 4</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>         
                                    <div class="form-group">
                                        <input class="btn btn-custom form-toggle" type="checkbox" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" name="conference">
                                        <span class="sr-only"> Toggle navigation</span>Conference Room
                                        <hr>
                                        <div id="collapseExample" class="navbar-collapse collapse">
                                            <div class="pt-2">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Room Name</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Room Name" name="room_no">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Purpose of Room</label>
                                                                <input type="text" class="form-control form-control-user" placeholder="Enter Purpose" name="room_purpose">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>Start Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="Start Time" name="start_time">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group pb-2">
                                                                <label>End Time</label>
                                                                <input type="time" class="form-control form-control-user" placeholder="End Time" name="end_time">
                                                            </div>
                                                        </div>
                                                    </div>
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
<?php 
include('footer_1.php'); 
include('scripts_1.php'); 
 ?>