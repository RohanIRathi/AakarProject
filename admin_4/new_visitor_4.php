<?php
include('header_4.php'); 
include('navbar_4.php'); 

include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
include('../php-utils/visitor.utils.php');

$link = connectionToDB($host, $username, $pass, $db);


if(isset($_POST['add_btn'])) {
    //echo 'heyyy clicked';
    addNewVisitorAppointment($link,$_SESSION['id']);
    //echo '<br>Function ended';
    echo $unsetData;
} 



?>




<?php
include('../new_visitor.php');
include('footer_4.php'); 
include('scripts_4.php'); 
?>
