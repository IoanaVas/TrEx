<?php
    session_start();
    session_unset();
    unset($_SESSION['manage_groupid']) ;
   
    session_destroy();

    
   
      
    header("location: index.php");

?>

