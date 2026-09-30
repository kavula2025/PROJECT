<?php

session_start();
include "connection.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username = '$username'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Check password
        if ($password == $user['password']) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Check role
            if ($user['role'] == 'admin') {
                header("Location: admin-dashboard.php");
                exit();

            } elseif ($user['role'] == 'student') {
                header("Location: student-dashboard.php");
                exit();
            }

        } else {

            echo "Wrong password";

        }

    } else {

        echo "Username not found";

    }
}

?>