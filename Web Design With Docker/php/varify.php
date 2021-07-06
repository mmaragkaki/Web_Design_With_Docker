<?php
include("config.php");
   session_start();
   
   //Arxeio gia tautopoiisi tou xristi kai anakateuthinsi stin arxiki selida an den tautopoiithi
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select USERNAME from Teachers where USERNAME = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>