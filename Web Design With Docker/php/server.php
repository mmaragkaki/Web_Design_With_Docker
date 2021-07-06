<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Pairnei tin metavlites pou stelnontai apo tin forma kai ektelei to query gia tin evresi onomatos kai eponumou
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    
    $sql = "SELECT ID,NAME,SURNAME FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $name = $row['NAME'];
    $surname = $row['SURNAME'];
    $count = mysqli_num_rows($result);
    //An uparxei to ID tou kathigiti epistrefete mia grammi     
    if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        header("location: teacher.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>