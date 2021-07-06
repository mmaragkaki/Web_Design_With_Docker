<?php
    include('server.php');
    include('varify.php');
    session_start();
?>

<html lang="en">
<head>
    <title>Search Student</title>
    <link rel="stylesheet" type="text/css" href="nav_style.css?version=63">
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
      <!-- Pinakas me ta stoixeia tou foititi -->
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
<div class="search">
<?php
    //Meso tou GET lamvanete to ID tou foititi apo tin proigoumeni selida 
    //me to onoma pou eixe dothei sti forma elegxete an to ID exei mikos 10 
    //Kai an vrethei eggrafi tote epistrefete mia seira kai ginetai i emfanisi ston pinaka
    $id = $_GET['idtosearch']; 
    $min_length = 10;
    if(strlen($id) == $min_length){ 
        $query ="SELECT * FROM Students WHERE ID = '$id';";
        $raw_results = mysqli_query($db,$query) or die(mysqli_error());
        if(mysqli_num_rows($raw_results) > 0){
            while($results = mysqli_fetch_array($raw_results)){ ?>
                <tbody>
                <tr>
                    <td  align="center"><?php echo $results['ID']; ?></td>
                    <td align="center"><?php echo $results['NAME']; ?></td>
                    <td align="center"><?php echo $results['SURNAME']; ?></td>
                    <td align="center"><?php echo $results['FATHERNAME']; ?></td>
                    <td align="center"><?php echo $results['GRADE']; ?></td>
                    <td align="center"><?php echo $results['MOBILENUMBER']; ?></td>
                    <td align="center"><?php echo $results['BIRTHDAY']; ?></td>
                </tr>
                </tbody>
           <?php } 
           
        }
        else{ 
            echo "<h1>Student does not exist</h1>";
        }
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }?>
    
</table>
</div>
</div>
</body>
</html>