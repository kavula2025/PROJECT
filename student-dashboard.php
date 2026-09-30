<?php

session_start();
include "connection.php";

// Hakikisha ni student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM students
        WHERE user_id = '$user_id'";

$result = mysqli_query($connection, $sql);

$student = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Student Dashboard</title>

    <link rel="stylesheet" href="style2.css">

</head>

<body>

<div class="dashboard">

    <div class="sidebar">

        <h2>Student Panel</h2>

        <a href="student-dashboard.php">
            Dashboard
        </a>

        <a href="update-profile.php">
            Update Profile
        </a>

        <a href="logout.php">
            Logout
        </a>

    </div>


    <div class="main">

        <h1>Student Dashboard</h1>

        <p>
            Welcome, <?php echo $student['first_name']; ?>
        </p>


        <div class="profile">

            <h2>My Information</h2>

            <p>
                <strong>Student ID:</strong>
                <?php echo $student['student_id']; ?>
            </p>

            <p>
                <strong>First Name:</strong>
                <?php echo $student['first_name']; ?>
            </p>

            <p>
                <strong>Last Name:</strong>
                <?php echo $student['last_name']; ?>
            </p>

            <p>
                <strong>Gender:</strong>
                <?php echo $student['gender']; ?>
            </p>

            <p>
                <strong>Date of Birth:</strong>
                <?php echo $student['date_of_birth']; ?>
            </p>

            <p>
                <strong>Phone:</strong>
                <?php echo $student['phone']; ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?php echo $student['email']; ?>
            </p>

            <p>
                <strong>Address:</strong>
                <?php echo $student['address']; ?>
            </p>

            <br>

            <a href="update-profile.php" class="button">
                Update Profile
            </a>

        </div>

    </div>

</div>

</body>
</html>