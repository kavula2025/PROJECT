<?php

include "connection.php";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $student_id_number = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Check if student selected courses
    if (!isset($_POST['courses'])) {
        echo "Please select at least one course";
        exit();
    }

    $courses = $_POST['courses'];


    // 1. Insert into users
    $sql1 = "INSERT INTO users
             (username, password, role)
             VALUES
             ('$username', '$password', 'student')";

    if (mysqli_query($connection, $sql1)) {

        // Get user ID
        $user_id = mysqli_insert_id($connection);


        // 2. Insert into students
        $sql2 = "INSERT INTO students
                (user_id, student_id, first_name, last_name,
                 gender, date_of_birth, phone, email, address)
                VALUES
                ('$user_id', '$student_id_number', '$first_name',
                 '$last_name', '$gender', '$date_of_birth',
                 '$phone', '$email', '$address')";

        if (mysqli_query($connection, $sql2)) {

            // Get student ID from students table
            $student_db_id = mysqli_insert_id($connection);


            // 3. Insert selected courses into registrations
            foreach ($courses as $course_id) {

                $date = date('Y-m-d');

                $sql3 = "INSERT INTO registrations
                        (student_id, course_id, registration_date)
                        VALUES
                        ('$student_db_id', '$course_id', '$date')";

                if (!mysqli_query($connection, $sql3)) {
                    echo "Course registration failed: "
                         . mysqli_error($connection);
                    exit();
                }
            }

            echo "Registration Successful!";

        } else {

            echo "Student Registration Failed: "
                 . mysqli_error($connection);
        }

    } else {

        echo "User Registration Failed: "
             . mysqli_error($connection);
    }
}

?>