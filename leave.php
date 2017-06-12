

<?php
require './test_connection.php';
session_start();
$groupid = $_GET['id'];
$myid = $_SESSION['login_id'];
$sql = "DELETE from group_participants WHERE users_id = '$myid' and group_id = '$groupid'";
$result2 = mysqli_query($db, $sql);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
header('Location: groups.php');
?>
