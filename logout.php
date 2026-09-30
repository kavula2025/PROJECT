<?php

session_start();

session_unset();
session_destroy();

header("location: student-dashboard.php");   //index 
exit();

?>   