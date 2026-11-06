
<?php

session_start();
include "connection.php";

// Hakikisha ni admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Get all courses
$sql = "SELECT * FROM courses";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Courses</title>

    <link rel="stylesheet" href="style.css">
  <style>
    /* Courses Page */
.course-container {
    width: 95%;
    margin: 30px auto;
    background-color: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 8px #ccc;
}

.course-container h1 {
    margin-bottom: 20px;
}

.course-table {
    width: 100%;
    border-collapse: collapse;
}

.course-table th {
    background-color: #007bff;
    color: white;
    padding: 12px;
    text-align: left;
}

.course-table td {
    padding: 12px;
    border: 1px solid #ddd;
}

.course-table tr:nth-child(even) {
    background-color: #f5f5f5;
}

.course-table tr:hover {
    background-color: #e9f2ff;
}


/* .navbar {
    width: 100%;
    background-color: #222;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    box-sizing: border-box;
    position: sticky;
} */

    .navbar {
    width: 100%;
    background-color: #222;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    box-sizing: border-box;

    position: sticky;
    top: 0;
    z-index: 1000;
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
    padding: 10px 15px;
    border-radius: 5px;
}

.nav-links a:hover {
    background-color: #007bff;
}
  </style>

</head>

<body>

<!-- Navigation Bar -->
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


<div class="course-container">

    <h1>All Courses</h1>

    <table class="course-table">

        <tr>
            <th>ID</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Description</th>
        </tr>

        <?php while ($course = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>
                <?php echo $course['id']; ?>
            </td>

            <td>
                <?php echo $course['course_code']; ?>
            </td>

            <td>
                <?php echo $course['course_name']; ?>
            </td>

            <td>
                <?php echo $course['description']; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>