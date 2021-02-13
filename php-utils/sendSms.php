<?php
include('../php-utils/textlocal.credentials.php');
require('../php-utils/textlocal.class.php');
 
	$Textlocal = new Textlocal(false, false, API_KEY);
  $x = '91'.$phone;
	$numbers = array($x);
	$sender = 'TXTLCL';
	$message = rawurlencode('Verification Token Id : '.$tokenId.'%nAakar Foundation Appointment time : '.date("F j, Y, g:i a",$timeStamp).'.%nWithout this token id, you wont be granted entry.');
  /*$message = 'Verification Token Id : '.$tokenId.'.	
  Kindly show this token id to the receptionist upon your arrival at Aakar Foundation on '.date("F j, Y, g:i a",$timeStamp).'. Without this token id, you wont be granted entry.'*/
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);
  

?>