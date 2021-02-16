<?php

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//send mail to given email id 
$subject = 'Token of verification for your appointment at Aakar Foundation.';
$message = '<b>Verification Token Id : '.$tokenId.'</b><br>Kindly show this token id to the receptionist upon your arrival at Aakar Foundation on '.date("F j, Y, g:i a",$timeStamp).'. Without this token id, you wont be granted entry. ';
if(mail($email,$subject,$message,$headers)) {
    //echo '<br>Mail Sent!';
}

?>