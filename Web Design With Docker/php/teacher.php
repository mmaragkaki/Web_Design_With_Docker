<?php
   include('varify.php');
   include('server.php');
   session_start();

?>
<html>
   
   <head>
      <title>Home</title>
      <link rel="stylesheet" type="text/css" href="nav_style.css?version=62">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
   </head>
   
   <body>
      <!-- Dimiourgia menu me epiloges kai anakateuthinsi stis katalliles selides-->
      <div class="topnav">
      <img src="icons8-account-90.png" alt="Avatar" class="avatar">
         <a href = "AddStudents.php">Add</a>
         <a href = "view.php">Edit</a>
         <a href="vie_del.php">Delete</a>
         <a href="ViewSearchField.php">Search</a>
         <a class="signout" href="logout.php">Sign Out</a>
         <p> <?php echo $_SESSION['name'] .' '. $_SESSION['surname'];?> </p>

      <!--Pinakas gia tin emfanisi olon ton eggrafon-->
      </div>
      <div class = "container">
      <table >
         <thead>
         <tr>
            <th><strong>ID</strong></th>
            <th><strong>NAME</strong></th>
            <th><strong>SURNAME</strong></th>
            <th><strong>FATHERNAME</strong></th>
            <th><strong>GRADE</strong></th>
            <th><strong>MOBILENUMBER</strong></th>
            <th><strong>BIRTHDAY</strong></th>
         </tr>
         </thead>
         <?php
         //Emfanisi olon ton foititon taksinomimenon me vasi to ID
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
            </tr>
          <?php  } ?>
            </tbody>
      </table>
      </div>
   </body>
   
</html>