<?php
session_start();
   //Eksodos apo tin efarmogi me anakateuthinsi stin arxiki selida
   if(session_destroy()) {
      header("Location: index.php");
   }
?>