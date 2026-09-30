<?php

session_start();
include "connection.php";

// Hakikisha ni admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}


// Pata student ID
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM students
            WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {

        header("Location: student-list.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($connection);

    }

} else {

    echo "Student ID not found";

}

?>