<?php
include('../php-utils/textlocal.credentials.php');
require('../php-utils/textlocal.class.php');
 
	$Textlocal = new Textlocal(false, false, API_KEY);
  $x = '91'.$phone;
  echo $x;
	$numbers = array($x);
	$sender = 'TXTLCL';
	$message = 'Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/';
  /*$message = 'Verification Token Id : '.$tokenId.'.
  Kindly show this token id to the receptionist upon your arrival at Aakar Foundation on '.date("F j, Y, g:i a",$timeStamp).'. Without this token id, you wont be granted entry.'*/
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);
  

?>