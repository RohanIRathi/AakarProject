<?php

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//send mail to given email id 
if(mail($email,$subject,$message,$headers)) {
    //echo '<br>Mail Sent!';
} else {
    //echo "<br>Not sent";
}

?>