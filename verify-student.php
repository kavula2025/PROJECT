<?php

session_start();
include "connection.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT status FROM students WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);

    $student = mysqli_fetch_assoc($result);

    if ($student['status'] == 'unverified') {

        $new_status = 'verified';

    } else {

        $new_status = 'unverified';
    }

    $update = "UPDATE students
               SET status = '$new_status'
               WHERE id = '$id'";

    if (mysqli_query($connection, $update)) {

        header("Location: student-list.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($connection);
    }

}

?>