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

    $sql = "SELECT * FROM students WHERE id = '$id'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {

        $student = mysqli_fetch_assoc($result);

    } else {

        echo "Student not found";
        exit();

    }

} else {

    echo "Student ID not found";
    exit();

}


// Update student
if (isset($_POST['update'])) {

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    $sql = "UPDATE students SET

            student_id = '$student_id',
            first_name = '$first_name',
            last_name = '$last_name',
            gender = '$gender',
            date_of_birth = '$date_of_birth',
            phone = '$phone',
            email = '$email',
            address = '$address'

            WHERE id = '$id'";


    if (mysqli_query($connection, $sql)) {

        echo "Student updated successfully";

        echo "<br><br>";

        echo "<a href='student-list.php'>Back to Student List</a>";

    } else {

        echo "Error: " . mysqli_error($connection);

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Student</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Edit Student</h2>


    <form method="POST">


        <label>Student ID</label>

        <input type="text"
               name="student_id"
               value="<?php echo $student['student_id']; ?>"
               required>


        <label>First Name</label>

        <input type="text"
               name="first_name"
               value="<?php echo $student['first_name']; ?>"
               required>


        <label>Last Name</label>

        <input type="text"
               name="last_name"
               value="<?php echo $student['last_name']; ?>"
               required>


        <label>Gender</label>

        <select name="gender">

            <option value="Male"
                <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>
                Male
            </option>

            <option value="Female"
                <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>
                Female
            </option>

        </select>


        <label>Date of Birth</label>

        <input type="date"
               name="date_of_birth"
               value="<?php echo $student['date_of_birth']; ?>">


        <label>Phone</label>

        <input type="text"
               name="phone"
               value="<?php echo $student['phone']; ?>">


        <label>Email</label>

        <input type="email"
               name="email"
               value="<?php echo $student['email']; ?>">


        <label>Address</label>

        <input type="text"
               name="address"
               value="<?php echo $student['address']; ?>">


        <button type="submit" name="update">
            Update Student
        </button>

    </form>


    <br>

    <a href="student-list.php">
        Back to Student List
    </a>

</div>

</body>

</html>