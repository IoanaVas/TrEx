<?php
    session_start();
    $_POST= array();
    if (!empty($_GET['id'])) {

    $this_group_id = $_GET['id'];
    
 
}
    header('Location: expenses_group.php?id='.$this_group_id);
 ?>

