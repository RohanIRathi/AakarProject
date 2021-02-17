<?php
include('header_1.php'); 
include('navbar_1.php'); 
?>
<?php

    include('../php-utils/db/db.variables.php');
    include('../php-utils/db/db.connection.php');

    $link = connectionToDB($host, $username, $pass, $db);

    function generateEmpList($link) {
        $query = "SELECT `id`,`first_name`,`last_name` from `admin`";
        $result = mysqli_query($link,$query);
        $empIdArr = array();
        $empNameArr = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($empIdArr,$row['id']);
            $name = $row['first_name'].' '.$row['last_name'];
            array_push($empNameArr,$name);
        }

        $query = "SELECT `hod_id`,`first_name`,`last_name` from `hod` WHERE `hod_id` != `admin_id`";
        $result = mysqli_query($link,$query);
        //echo mysqli_error($link);
        while($row = mysqli_fetch_array($result)) {
            array_push($empIdArr,$row['hod_id']);
            $name = $row['first_name'].' '.$row['last_name'];
            array_push($empNameArr,$name);
        }

        $query = "SELECT `employee_id`,`first_name`,`last_name` from `employee` WHERE `employee_id` != `hod_id`";
        $result = mysqli_query($link,$query);
        //echo mysqli_error($link);
        while($row = mysqli_fetch_array($result)) {
            array_push($empIdArr,$row['employee_id']);
            $name = $row['first_name'].' '.$row['last_name'];
            array_push($empNameArr,$name);
        }

        //print_r($empIdArr);
        //print_r($empNameArr);
        $str = "";
        for($i=0;$i<sizeof($empIdArr);$i++) {
            $str.='<option value="'.$empIdArr[$i].'">'.$empNameArr[$i].'</option>';
        } //echo $str;
        return $str;

    }
    $str = generateEmpList($link);

?>
<main>
    <div class="container">
    <?php
    if(isset($_POST["add_btn"])) {
        include('../php-utils/visitor_variables.php');
        include('../php-utils/visitor.utils.php');
        $visiteeId = $_POST['option'];
        addNewVisitorAppointment($link,$visiteeId);
        echo $unsetData;
    }

    ?>
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
                                                value="yyyy-MM-dd" 
                                                id="currentDate" 
                                                name="date"required >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Time</label>
                                                <input type="time" class="form-control form-control-user" placeholder="Enter Time"
                                                value="HH:mm" 
                                                id="currentTime" 
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
                                                    <input type="radio" class="form-control form-control-user" name="optradio1">Personal
                                                </label>
                                                <label class="radio-inline  mr-3">
                                                    <input type="radio"class="form-control form-control-user" name="optradio1">Industrial
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group pb-2">
                                                <label>Hospitality</label><br>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" class="form-control form-control-user" name="optradio3">Breakfast
                                                </label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" class="form-control form-control-user" name="optradio3">Lunch
                                                </label>
                                                <label class="radio-inline  mr-3">
                                                    <input type="radio"class="form-control form-control-user" name="optradio3">Dinner
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
                                                <?php echo $str;?>
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
<script>
var date = new Date();
var currentDate = date.toISOString().slice(0,10);
//var currentTime = date.getHours() + ':' + date.getMinutes();
document.getElementById('currentDate').value = currentDate;
//document.getElementById('currentTime').value = currentTime;
</script>