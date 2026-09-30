<?php

$username = "root";
$hostname = "localhost";
$password = "";
$database = "student_registration";

$connection = mysqli_connect("$hostname","$username","$password","$database")
or die("failed to connect");

//echo "connection done";
?>