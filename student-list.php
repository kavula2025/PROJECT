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

    </style>

</head>

<body>

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
<!-- ACTION -->
<td class="action-box">

    <?php if ($student['status'] == 'inactive') { ?>

        <a href="confirm-student.php?id=<?php echo $student['id']; ?>"
           class="action-btn confirm-btn">
            Confirm
        </a>

    <?php } else { ?>

        <span class="action-btn active-btn">
            Active
        </span>

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