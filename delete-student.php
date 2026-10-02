
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

    // Anza transaction
    mysqli_begin_transaction($connection);

    try {

        // Futa registrations zinazomhusu student
        $sql1 = "DELETE FROM registrations WHERE student_id = '$id'";
        mysqli_query($connection, $sql1);

        // Halafu futa student
        $sql2 = "DELETE FROM students WHERE id = '$id'";
        mysqli_query($connection, $sql2);

        // Kama kila kitu kimefanikiwa
        mysqli_commit($connection);

        header("Location: student-list.php");
        exit();

    } catch (mysqli_sql_exception $e) {

        // Rudisha mabadiliko kama kuna error
        mysqli_rollback($connection);

        echo "Error: " . $e->getMessage();
    }

} else {

    echo "Student ID not found";
}

?>
