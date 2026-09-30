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
            <th>Action</th>

        </tr>

        <?php while ($student = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $student['id']; ?></td>

            <td><?php echo $student['student_id']; ?></td>

            <td><?php echo $student['first_name']; ?></td>

            <td><?php echo $student['last_name']; ?></td>

            <td><?php echo $student['gender']; ?></td>

            <td><?php echo $student['phone']; ?></td>

            <td><?php echo $student['email']; ?></td>

            <td>

                <a href="edit-student.php?id=<?php echo $student['id']; ?>">
                    Edit
                </a>

                |

                <a href="delete-student.php?id=<?php echo $student['id']; ?>"
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