<?php
session_start();
include('header_3.php'); 
include('navbar_3.php'); 

include('../php-utils/db/db.variables.php');
include('../php-utils/db/db.connection.php');
include('../php-utils/visitor.utils.php');

$link = connectionToDB($host, $username, $pass, $db);


if(isset($_POST['add_btn'])) {
    //echo 'heyyy clicked';
    addNewVisitorAppointment($link,$_SESSION['id']);
    //echo '<br>Function ended';
} 

?>

<?php
include('../new_visitor.php'); 
include('footer_3.php'); 
include('scripts_3.php'); 
?>

