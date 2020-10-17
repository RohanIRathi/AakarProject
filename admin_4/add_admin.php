<?php

	include('../php-utils/user_variables.php');

	if($_SESSION['type'] == "admin")
	{
		$query = "INSERT INTO `admin`(`username`, `email`, `password`) VALUES (`$username`,`$email`,`$password`)";

		$run = mysqli_query($mysqli, $query);
	}
	else
		echo "Not an admin! Can't add Admin!";

?>