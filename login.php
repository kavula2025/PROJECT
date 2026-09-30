<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <style>
        body{
            background-color: yellowgreen;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .menus{
            background-color: aqua;
            padding: 100px;
            border-radius: 40px;
            color: darkblue;
        }
        .labels{
            display: flex;
            padding: 10px;
            flex-direction: column;
        }
        input{
            padding: 10px;
            border-radius: 10px;
            border-color: red;
            border: none;
            color: blueviolet;
            margin:5px;
        }
        button{
            right: 650px;
            border-radius: 10px;
            position: absolute;
            height: 33px;
            margin-top: 20px;
            border: none;
            background: green;
            color: bisque;
            cursor: pointer;
        }
        button:hover{
            background-color: blue;
            color: darkred;
        }
    </style>
    
</head>
<body>
    <div class="menus">
        <form action="action2.php" id="form" method="POST">
            <h1>Login Form</h1>
        <div class="labels">

            <label for="username">Username</label>
            <input type="text" name="username" id="email" placeholder="">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="">
        </div>
        <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>