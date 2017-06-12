<?php
    session_start();
    session_unset();
    unset($_SESSION['manage_groupid']) ;
   
    session_destroy();

    
   
      
    header("location: index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

