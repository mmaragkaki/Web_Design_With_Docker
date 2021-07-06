<?php
include('server.php');
include('varify.php');
?>

<html lang="en">
<head>
    <title>WebCourses</title>
    <link rel="stylesheet" type="text/css" href="search.css?version=63">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
      <!-- Dimiourgia menu me epiloges kai anakateuthinsi stis katalliles selides-->
    <div class="topnav">
    <img src="icons8-account-90.png" alt="Avatar" class="avatar">
         <a href="teacher.php">Home</a>
         <a href = "AddStudents.php">Add</a>
         <a href = "view.php">Edit</a>
         <a href="vie_del.php">Delete</a>
         <a href="ViewSearchField.php">Search</a>
         <a class="signout" href = "logout.php">Sign Out</a>
         <p> <?php echo $_SESSION['name'] .' '. $_SESSION['surname']; ?> </p>
      </div> 
      <!--Dimiourgia formas gia tin anazitisi foititi -->
   <div class="searchbox">
        <h1>Search for a Student</h1>  
    <form action ="Search.php" method = "GET">
            <p>Please Enter ID:</p>
            <input type="text" name="idtosearch" placeholder="Enter ID"> <br>
            <input type="submit" name="search" value="Search"><br>
        </form>
</div>

</body>
</html>
