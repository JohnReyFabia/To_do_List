<?php 

    $con = new mysqli('localhost:3307', 'root', '', 'todo');
    if(!$con){
        die(mysqli_error($con));
    }
?>
