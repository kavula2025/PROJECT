<?php

session_start();
include "connection.php";

// kumuhakiki student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: index.php");  //student-dashboard.php
    exit();
}

$user_id = $_SESSION['user_id'];


$sql = "SELECT * FROM students
        WHERE user_id = '$user_id'";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) == 1) {

    $student = mysqli_fetch_assoc($result);

} else {

    echo "Student not found";
    exit();

}


// Update profile ya student
if (isset($_POST['update'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    $sql = "UPDATE students SET

            first_name = '$first_name',
            last_name = '$last_name',
            gender = '$gender',
            date_of_birth = '$date_of_birth',
            phone = '$phone',
            email = '$email',
            address = '$address'

            WHERE user_id = '$user_id'";


    if (mysqli_query($connection, $sql)) {

        echo "Profile updated successfully";

    } else {

        echo "Error: " . mysqli_error($connection);

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Update Profile</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Update My Profile</h2>


    <form method="POST">

        <label>Student ID</label>

        <input type="text"
               value="<?php echo $student['student_id']; ?>"
               disabled>


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
            Update Profile
        </button>

    </form>


    <br>

    <a href="student-dashboard.php">
        Back to Dashboard
    </a>

</div>

</body>

</html>