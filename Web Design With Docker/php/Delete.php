<?php
    require('server.php');
    include('varify.php');

    //Ektelesi query gia tin diagrafi foititi
    $id=$_REQUEST['ID'];
    $query = "DELETE FROM Students WHERE ID = '$id';"; 
    $result = mysqli_query($db,$query) or die ( mysqli_error());
    header("location: teacher.php"); 
?>
