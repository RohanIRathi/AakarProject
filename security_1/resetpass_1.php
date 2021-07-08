<?php
include('header_1.php');
include('navbar_1.php');


include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
include('../php-utils/login.utils.php');

$link = connectionToDB($host, $username, $pass, $db);

if(isset($_POST['reset_btn'])) {
    
} 


include('../resetpass.php');
include('footer_1.php');
include('scripts_1.php');
?>