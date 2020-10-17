<?php

	include('../php-utils/user_variables.php');

	if($_SESSION['type'] == "hod")
	{
		$id = $mysqli -> real_escape_string($_SESSION["id"]);
		$query = "INSERT INTO `employee`(`username`, `email`, `password`, `hod_id`) VALUES (`$username`,`$email`,`$password`,`$id`)";

		$run = mysqli_query($mysqli, $query);
	}
	else
		echo "Not an HOD! Can't add employee!";

?>