<?php
   include('server.php');
   include('varify.php');
   session_start();
   //Anazitisi foititi sti vasi me vasi to ID tou pou uparxei sti forma 
   $id=$_REQUEST['ID'];
   $query = "SELECT * from Students where ID ='$id';"; 
   $result = mysqli_query($db, $query) or die ( mysqli_error());
   $row = mysqli_fetch_assoc($result);
?>

<html>
   <head>
      <title>Edit Students</title>
      <link rel="stylesheet" type="text/css" href="nav_style.css?version=56">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
   <div class="topnav">
    <!-- Dimiourgia menu me epiloges kai anakateuthinsi stis katalliles selides-->
   <img src="icons8-account-90.png" alt="Avatar" class="avatar">
         <a href="teacher.php">Home</a>
         <a href = "AddStudents.php">Add</a>
         <a href ="view.php">Edit</a>
         <a href="vie_del.php">Delete</a>
         <a href="ViewSearchField.php">Search</a>
         <a class="signout" href = "logout.php">Sign Out</a>
         <p> <?php echo $_SESSION['name'] .' '. $_SESSION['surname']; ?> </p>
   </div>
      <?php
           //Kodikas gia to Update ton stoixeion tou foititi me to sigkekrimeno ID
            if(isset($_POST['new']) && $_POST['new']==1)
            {
                $id = $_REQUEST['ID'];
                $name = $_REQUEST['NAME'];
                $surname = $_REQUEST['SURNAME'];
                $fathername = $_REQUEST['FATHERNAME'];
                $grade = $_REQUEST['GRADE'];
                $mobile = $_REQUEST['MOBILENUMBER'];
                $birthday = $_REQUEST['BIRTHDAY'];
                $update = "UPDATE Students SET NAME = '$name', SURNAME = '$surname', FATHERNAME ='$fathername', GRADE = '$grade', MOBILENUMBER ='$mobile', BIRTHDAY = '$birthday' WHERE ID = '$id';";
                mysqli_query($db, $update) or die(mysqli_error());
                header("Location: teacher.php");
           
            }else {
            ?>
             <!--Emfanisi formas me ta stoixeia tou foititi tou opoiou 
               dothike to ID kai ta stoixeia tou epistrafikan apo ton kodika stin arxi--> 
                <div class="editbox">
                    <form  action="EditStudents.php" method="POST"> 
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="ID"  value="<?php echo $row['ID'];?>"/>
                        <p><input type="text" name="NAME" placeholder="Enter Name" 
                        required value="<?php echo $row['NAME'];?>" /></p>
                        <p><input type="text" name="SURNAME" placeholder="Enter Surname" 
                        required value="<?php echo $row['SURNAME'];?>" /></p>
                        <p><input type="text" name="FATHERNAME" placeholder="Enter Father's name" 
                        required value="<?php echo $row['FATHERNAME'];?>" /></p>
                        <p><input type="text" name="GRADE" placeholder="Enter Grade" 
                        required value="<?php echo $row['GRADE'];?>" /></p>
                        <p><input type="text" name="MOBILENUMBER" placeholder="Enter Mobile Number" 
                        required value="<?php echo $row['MOBILENUMBER'];?>" /></p>
                        <p><input type="text" name="BIRTHDAY" placeholder="Enter Birthday" 
                        required value="<?php echo $row['BIRTHDAY'];?>" /></p>
                        <p><input name="update" type="submit" value="Update" /></p>
                    </form>
                    </div>
        <?php }?>
   </body>
</html>