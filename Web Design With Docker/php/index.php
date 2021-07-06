<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WebCourses</title>
    <link rel="stylesheet" type="text/css" href="style.css?version=53">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- Forma gia tin sumplirosi username kai password -->
    <div class="loginbox">
    <img src="icons8-account-90.png" alt="Avatar" class="avatar">
        <h1>Log in</h1>
        <form action = "" method = "post">
            <p>Username:</p>
            <input type="text" name="username" placeholder="Enter your Username"><br>
            <p>Password:</p>
            <input type="password" name="password" placeholder="Enter your Password"><br><br>
            <input type="submit" name="login" value="Log in"><br>
        </form>
    </div>
</body>
</html>
