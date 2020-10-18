<?php

	include('../php-utils/user_variables.php');
	include('../php-utils/signup.utils.php');
	if(checkIfEmailAlreadyExists($email,'admin',$link)) {

		$error = true;
		
	} else {

		$query = 'INSERT INTO `admin` (`username`, `email`, `password`) VALUES ("'.$username.'","'.$email.'","'.$password.'")';
		if(mysqli_query($link, $query)) {
			$success = true;;
		} else {
			echo mysqli_error($link);
		}

	}

	
	

?>