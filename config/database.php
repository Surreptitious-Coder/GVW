<?php

$con = mysqli_connect("localhost","root","",$database="test2");

if (mysqli_connect_errno()){
    echo "Error connecting to the database - " . $mysqli_connect_error();
}
?>
