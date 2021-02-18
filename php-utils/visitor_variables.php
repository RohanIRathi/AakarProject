<?php

    //print_r($_POST);
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $date = mysqli_real_escape_string($link, $_POST['date']);
    $time = mysqli_real_escape_string($link, $_POST['time']);
    $novisitors =  $_POST['no_of_visitor'];
    //$photoid = mysqli_real_escape_string($link, $_POST['img']);
    $photoidvalue = mysqli_real_escape_string($link, $_POST['Govt_ID']);
    $phone = mysqli_real_escape_string($link, $_POST['phone_no']);
    $purpose = mysqli_real_escape_string($link, $_POST['optradio1']);
    $hospitality = mysqli_real_escape_string($link, $_POST['optradio3']);
    if(isset($_POST['conference']))
    {
        $conference = 'TRUE';
        $room_no = mysqli_real_escape_string($link, $_POST['room_no']);
        $room_purpose = mysqli_real_escape_string($link, $_POST['room_purpose']);
        $start_time = mysqli_real_escape_string($link, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($link, $_POST['end_time']);
    }
    else
    {
        $conference = 'FALSE';
        $room_no = null;
        $room_purpose = null;
        $start_time = null;
        $end_time = null;
    }

    // echo '<br>First Name : '.$first_name. 
    // '<br>Last Name : '.$last_name.
    // '<br>Email : '.$email.
    // '<br>Date : '.$date .
    // '<br>Time : '.$time .
    // '<br>NumVisitors : '.$novisitors.
    // //'<br>Name'.$photoid.
    // //'<br>P'.$photoidvalue.
    // '<br>phone : '.$phone .
    // '<br>purpose : '.$purpose.
    // '<br>hospitality : '.$hospitality.
    // '<br>conference : '.$conference.
    // '<br>room_no : '.$room_no.
    // '<br>room_purpose : '.$room_purpose.
    // '<br>start_time : '.$start_time.
    // '<br>end_time : '.$end_time;

    $date = explode("-",$date);
    $time = explode(":",$time);
    $currTime = time();
    // echo '<br> Date array : '.print_r($date);
    // echo '<br> Time array : '.print_r($time);

    $timeStamp = mktime($time[0],$time[1],0,$date[1],$date[2],$date[0]);
    $error = NULL;
    if($timeStamp < $currTime) {
        $error = 'Please enter valid time.';
        //echo $error;
        return;
    }

    //echo '<br>Exact date : '.date("F j, Y, g:i a",$timeStamp);
    $dateOfAppointment = date("d-m-y",$timeStamp);
    $tokenId = rand(100000,999999);


?>