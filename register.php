
<?php

include "connection.php";

$sql = "SELECT * FROM courses";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Student Registration</h2>

    <form action="action.php" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Student ID</label>
        <input type="text" name="student_id" required>

        <label>First Name</label>
        <input type="text" name="first_name" required>

        <label>Last Name</label>
        <input type="text" name="last_name" required>

        <label>Gender</label>

        <select name="gender" required>

            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth">


        <label>Phone</label>
        <input type="text" name="phone">


        <label>Email</label>
        <input type="email" name="email">


        <label>Address</label>
        <input type="text" name="address">


        <h3>Select Courses</h3>

        <?php while ($course = mysqli_fetch_assoc($result)) { ?>
        
            <label>
                <input type="checkbox"
                       name="courses[]"
                       value="<?php echo $course['id']; ?>">

                <?php echo $course['course_code']; ?>
                -
                <?php echo $course['course_name']; ?>

            </label>

         <?php } ?> 

        <button type="submit" name="register">
            Register
        </button>

    </form>
    
</div>

</body>

</html>