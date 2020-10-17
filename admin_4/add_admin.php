<?php

	include('../php-utils/user_variables.php');

	$query = 'INSERT INTO `admin` (`username`, `email`, `password`) VALUES ("'.$username.'","'.$email.'","'.$password.'")';
	if(mysqli_query($link, $query)) {
		$success = 'Admin added successfully';
	} else {
		echo mysqli_error($link);
	}
	
	

?>