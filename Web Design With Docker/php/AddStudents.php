<?php
   include('server.php');
   include('varify.php');
   session_start();
   //Elegxos gia ton an exei ginei Submit apo tin HTML kai an to aitima exei erthei apo ti forma eisagogis
   if(isset($_POST['new']) && $_POST['new']==1){
    //Ektelesh query gia to an uparxei (diladi epistrafoun seires meta tin ektelesi tou erotimatos) 
    //idi eggrafi me to idio ID ston 
    //pinaka an den uparxei tote ginetai kanonika eggrafi
    $id = $_REQUEST['ID'];
    $query = mysqli_query($db, "SELECT * FROM Students WHERE ID='".$id."'");
    if (!$query)
    {
        die('Error: ' . mysqli_error($con));
    }
   if(mysqli_num_rows($query) > 0){
      echo "<h1>This ID already exists. Please try with another</h1>";
      header("location: teacher.php");
   }else{
      $name = $_REQUEST['NAME'];
      $surname = $_REQUEST['SURNAME'];
      $fathername = $_REQUEST['FATHERNAME'];
      $grade = $_REQUEST['GRADE'];
      $mobile = $_REQUEST['MOBILENUMBER'];
      $birthday = $_REQUEST['BIRTHDAY'];
      $ins_query = "INSERT INTO Students (`ID`, `NAME`, `SURNAME`, `FATHERNAME`, `GRADE`, `MOBILENUMBER`, `BIRTHDAY`) VALUES ('$id','$name','$surname','$fathername','$grade','$mobile','$birthday');";
      mysqli_query($db,$ins_query) or die(mysql_error());
      header("location: teacher.php");
      }
   }
?>

<html>
   <head>
      <title>AddStudents</title>
      <link rel="stylesheet" type="text/css" href="nav_style.css?version=67">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
   <div class="topnav">
   <!-- Dimiourgia menu me epiloges kai anakateuthinsi stis katalliles selides-->
   <img src="icons8-account-90.png" alt="Avatar" class="avatar">
         <a href = "teacher.php">Home</a>
         <a class="add" href = "AddStudents.php">Add</a>
         <a href = "view.php">Edit</a>
         <a href="vie_del.php">Delete</a>
         <a href="ViewSearchField.php">Search</a>
         <a class="signout" href = "logout.php">Sign Out</a>
         <p> <?php echo $_SESSION['name'] .' '. $_SESSION['surname']; ?> </p>
      </div>
   <div class="insertbox">
      <!--Forma gia tin eisagogi ton stoixeion tou foititi me xrisi tin methodou post -->
        <h1>Insert New Student</h1>
        <form action = "AddStudents.php" method = "POST">
        <input type="hidden" name="new" value="1"/>
            ID:
            <input type="text" oninvalid="alert('ID must have 10 digits');"  name="ID" placeholder="Enter the ID" pattern=".{10}" required><br>
            Name:
            <input type="text" oninvalid="alert('You must fill out the form!');" name="NAME" placeholder="Enter Name"  required><br>
            Surname:
            <input type="text" oninvalid="alert('You must fill out the form!');" name="SURNAME" placeholder="Enter Surname"  required><br>
            Fathername:
            <input type="text" oninvalid="alert('You must fill out the form!');" name="FATHERNAME" placeholder="Enter Father's Name"  required><br>
            Grade:
            <input type="text"  oninvalid="alert('You must fill out the form!');" name="GRADE" placeholder="Enter Grade" required><br>
            Mobile Number:
            <input type="text"  oninvalid="alert('You must fill out the form!');" name="MOBILENUMBER" placeholder="Enter Mobile Number" required><br>
            Birthday:
            <input type="text" oninvalid="alert('You must fill out the form!');"  name="BIRTHDAY" placeholder="Enter Birthday" required><br><br>
            <input type="submit" name="submit" value="Insert"><br>
        </form>
    </div>
   </body>
</html>