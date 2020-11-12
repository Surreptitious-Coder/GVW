<?php

$con = mysqli_connect("db", $user="devuser",$password="devpass",$database="GVWA");

//$con = mysqli_connect("localhost","root");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>