<?php
    function connetionToDB($host,$username,$pass,$db) {
        $link = mysqli_connect($host,$username,$pass,$db);
        if(mysqli_connect_error()) {
            die("Database Connection failed!");
        } else {
            //echo "connection successful";
            return $link;
        }
    } 
?>