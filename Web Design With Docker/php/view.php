<?php
   include('server.php');
   include('varify.php');
   session_start();
   $id=$_REQUEST['ID'];
   $query = "SELECT * from Students where ID ='$id'"; 
   $result = mysqli_query($db, $query) or die ( mysqli_error());
   $row = mysqli_fetch_assoc($result);
?>
<html>
<head>
      <title> View Records </title>
      <link rel="stylesheet" type="text/css" href="nav_style.css?version=60">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <!-- Dimiourgia menu me epiloges kai anakateuthinsi stis katalliles selides-->
   <div class="topnav">
   <img src="icons8-account-90.png" alt="Avatar" class="avatar">
         <a href="teacher.php">Home</a>
         <a href = "AddStudents.php">Add</a>
         <a href ="view.php">Edit</a>
         <a href="vie_del.php">Delete</a>
         <a href="ViewSearchField.php">Search</a>
         <a class="signout" href = "logout.php">Sign Out</a>
         <p> <?php echo $_SESSION['name'] .' '. $_SESSION['surname']; ?> </p>
   </div>
   <!--Emfanisi pinaka me oles tis egrafes kai tin epilogi gia edit-->
      <div class="container">
      <table >
         <thead>
         <tr >
            <th ><strong>ID</strong></th>
            <th ><strong>NAME</strong></th>
            <th ><strong>SURNAME</strong></th>
            <th ><strong>FATHERNAME</strong></th>
            <th ><strong>GRADE</strong></th>
            <th ><strong>MOBILENUMBER</strong></th>
            <th ><strong>BIRTHDAY</strong></th>
            <th ><strong>Edit</strong></th>
         </tr>
         </thead>
      
         <?php
         //SQL erotima gia tin emfanisi ton foititon taksinomimenon me to ID
            $sel_query="SELECT * FROM Students ORDER BY ID;";
            $result = mysqli_query($db,$sel_query);
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
            <tr>
               <td align="center"><?php echo $row["ID"]; ?></td>
               <td align="center"><?php echo $row["NAME"]; ?></td>
               <td align="center"><?php echo $row["SURNAME"]; ?></td>
               <td align="center"><?php echo $row["FATHERNAME"]; ?></td>
               <td align="center"><?php echo $row["GRADE"]; ?></td>
               <td align="center"><?php echo $row["MOBILENUMBER"]; ?></td>
               <td align="center"><?php echo $row["BIRTHDAY"]; ?></td>
               <td align="center">
                <a href="EditStudents.php?ID=<?php echo $row["ID"]; ?>">Edit</a>
               </td>
            </tr>
          <?php  } ?>
            </tbody>
      </table>
      </div>
    </body>
</html>