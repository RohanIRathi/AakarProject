<?php

if(!function_exists("addNewVisitor")) {

    function addNewVisitorAppointment($link,$visiteeId) {
        include('../php-utils/visitor_variables.php');
        if($error){
            echo '<div class="alert alert-danger" role="alert"><b>
            '.$error.'
          </b></div>';
            return;
        }
        //include('../php-utils/sendMail.php');
        //include('../php-utils/sendSms.php');
        echo $tokenId;
        $hashedTokenId = password_hash($tokenId,PASSWORD_BCRYPT);

        $query = "INSERT INTO `visitor` (`first_name`,`last_name`,`email`,`purpose`,`time`,`noofvisitors`,`photo_id_no`,`hospitality`,`conference`,`conference_room`,`room_purpose`,`start_time`,`end_time`,`visitee`,`tokenid`,`phone_no`,`dateofappointment`) VALUES ('".$first_name."','".$last_name."','".$email."','".$purpose."','".$timeStamp."',".$novisitors.",'".$photoidvalue."','".$hospitality."','".$conference."','".$room_no."','".$room_purpose."','".$start_time."','".$end_time."','".$visiteeId."','".$hashedTokenId."','".$phone."','".$dateOfAppointment."')";

        if(mysqli_query($link,$query)){
            echo '<div class="alert alert-success" role="alert">
                <b>Appointment Booking successful.</b>
            </div>';
        } else {
            echo '<br>error : '.mysqli_error($link);
        }
    }

}

if(!function_exists("showData")) {
    function showData($link) {
        
        $query = "SELECT * FROM `visitor` WHERE `visitee` = ".$_SESSION['id']." AND `dateofappointment` = '".date("d-m-y")."' AND `status` = 'BOOKED'";
        $result = mysqli_query($link,$query);
        if ($result == TRUE) {
            return $result;
        }
        else{
            echo mysqli_error($link);
            echo "<br>Error!here q : ".$query;
            echo '<br>id : '.$_SESSION['id'].'<br>';
        }
    }
}


if(!function_exists("getOngoingData")) {

    function getOngoingData($link) {

        $query = "SELECT `id`,`first_name`,`last_name`,`email`,`time`,`noofvisitors` FROM `visitor` WHERE `status` = 'ONGOING' ";
        $result = mysqli_query($link,$query);
        echo mysqli_error($link);
        if ($result == TRUE) {
            return $result;
        }
        else{
            echo "Error!";
        }

    }

}

?>