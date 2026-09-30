<?php

include("connection.php");

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // 1. Insert into users
    $sql = "INSERT INTO users (username, password, role)
            VALUES ('$username', '$password', 'student')";

    if (mysqli_query($connection, $sql)) {

        // Get the new user's ID
        $user_id = mysqli_insert_id($connection);

        // 2. Insert into students
        $sql2 = "INSERT INTO students
                (user_id, student_id, first_name, last_name, gender,
                 date_of_birth, phone, email, address)
                VALUES
                ('$user_id', '$student_id', '$first_name', '$last_name',
                 '$gender', '$date_of_birth', '$phone', '$email',
                 '$address')";

        if (mysqli_query($connection, $sql2)) {

            echo "Registration successful!";

        } else {

            echo "Student registration failed: " . mysqli_error($connection);
        }

    } else {

        echo "User registration failed: " . mysqli_error($connection);
    }
}

?>