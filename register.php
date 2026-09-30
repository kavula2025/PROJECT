<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link href = "style.css" rel=stylesheet>
</head>
<body>

<h2>Student Registration</h2>

<form action="action.php" method="POST">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Student ID:</label><br>
    <input type="text" name="student_id" required><br><br>

    <label>First Name:</label><br>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" required><br><br>

    <label>Gender:</label><br>
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>

    <label>Date of Birth:</label><br>
    <input type="date" name="date_of_birth"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address"><br><br>

    <button type="submit" name="register">Register</button>

</form>

</body>
</html>