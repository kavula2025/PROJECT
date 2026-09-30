<?php

session_start();
include "connection.php";

// Hakikisha ni admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Count students
$sql = "SELECT COUNT(*) AS total FROM students";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($result);

$total_students = $data['total'];

?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="style2.css">

</head>

<body>

<div class="dashboard">

    <div class="sidebar">

        <h2>Admin Panel</h2>

        <a href="admin-dashboard.php">Dashboard</a>

        <a href="student-list.php">View Students</a>

        <a href="logout.php">Logout</a>

    </div>


    <div class="main">

        <h1>Admin Dashboard</h1>

        <p>Welcome, <?php echo $_SESSION['username']; ?></p>


        <div class="cards">

            <div class="card">

                <h3>Total Students</h3>

                <p><?php echo $total_students; ?></p>

            </div>

        </div>


        <div class="actions">

            <h2>Student Management</h2>

            <a href="student-list.php" class="button">
                View All Students
            </a>

        </div>

    </div>

</div>

</body>
</html>