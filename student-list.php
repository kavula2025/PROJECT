<?php

session_start();
include "connection.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM students";

$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html>


<head>

    <title>Student List</title>

    <link rel="stylesheet" href="style2.css">

    <style>

        .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #222;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    
}

body{
    padding-top: 20px;
}

.logo {
    color: white;
    font-size: 20px;
    font-weight: bold;
}

.nav-links {
    display: flex;
    gap: 10px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    padding: 9px 15px;
    border-radius: 5px;
}

.nav-links a:hover {
    background-color: #007bff;
}
        /* ACTION BUTTONS */
.action-box {
    display: flex;
    gap: 6px;
    align-items: center;
    white-space: nowrap;
}

/* Button ya kawaida */
.action-btn {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border: none;
    cursor: pointer;
}

/* Active */
.active-btn {
    background-color: #28a745;
}

/* Confirm */
.confirm-btn {
    background-color: #007bff;
}

.confirm-btn:hover {
    background-color: #0056b3;
}

/* Edit */
.edit-btn {
    background-color: #f0ad4e;
}

.edit-btn:hover {
    background-color: #ec971f;
}

/* Delete */
.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #b02a37;
}

/* VERIFY BUTTON */
.verify-btn {
    background-color: #6f42c1;
    color: white;
    padding: 7px 12px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
}

.verify-btn:hover {
    background-color: #59339d;
}


/* ACTION BUTTONS */

.action-btn {
    display: inline-block;
    padding: 7px 12px;
    margin: 2px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 13px;
    font-weight: bold;
}

/* VERIFY */
.verify-btn {
    background-color: #28a745;
}

.verify-btn:hover {
    background-color: #218838;
}

/* UNVERIFY */
.unverify-btn {
    background-color: #f39c12;
}

.unverify-btn:hover {
    background-color: #d68910;
}

/* EDIT */
.edit-btn {
    background-color: #007bff;
}

.edit-btn:hover {
    background-color: #0056b3;
}

/* DELETE */
.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #c82333;
}

    </style>

</head>

<body>

<nav class="navbar">

    <div class="logo">
        Student Registration System
    </div>

    <div class="nav-links">

        <a href="#dashboard">Dashboard</a>

        <a href="student-list.php">Students</a>

        <a href="course-list.php">Courses</a>

        <a href="logout.php">Logout</a>

    </div>

</nav>

<div class="container">

    <h1>All Students</h1>

    <a href="admin-dashboard.php" class="button">
        Back to Dashboard
    </a>

    <br><br>
<table>

    <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>


    <?php while ($student = mysqli_fetch_assoc($result)) { ?>

    <tr>

        <td>
            <?php echo $student['id']; ?>
        </td>

        <td>
            <?php echo $student['student_id']; ?>
        </td>

        <td>
            <?php echo $student['first_name']; ?>
        </td>

        <td>
            <?php echo $student['last_name']; ?>
        </td>

        <td>
            <?php echo $student['gender']; ?>
        </td>

        <td>
            <?php echo $student['phone']; ?>
        </td>

        <td>
            <?php echo $student['email']; ?>
        </td>


        <!-- STATUS -->
        <td>
            <?php echo $student['status']; ?>
        </td>

<!-- ACTION -->

<td class="action-box">

    <?php if ($student['status'] == 'unverified') { ?>

        <a href="verify-student.php?id=<?php echo $student['id']; ?>"
           class="action-btn verify-btn">
            Verify
        </a>

    <?php } else { ?>

        <a href="verify-student.php?id=<?php echo $student['id']; ?>"
           class="action-btn unverify-btn">
            Unverify
        </a>

    <?php } ?>

    <a href="edit-student.php?id=<?php echo $student['id']; ?>"
       class="action-btn edit-btn">
        Edit
    </a>

    <a href="delete-student.php?id=<?php echo $student['id']; ?>"
       class="action-btn delete-btn"
       onclick="return confirm('Are you sure you want to delete this student?');">
        Delete
    </a>

</td>



    </tr>

    <?php } ?>

</table>
 

</div>

</body>

</html>