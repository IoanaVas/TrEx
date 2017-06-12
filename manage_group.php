<?php
require './test_connection.php';

session_start();


$msg_add_user = " ";
$msg_kick_user = " ";
$msg_desc = " ";


   
  $groupid = $_SESSION['manage_groupid'];

 $sql = "Select description from group_details where id = '$groupid' ";
 $result = mysqli_query($db, $sql);
 $rowz = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $description = $rowz['description'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $myid = $_SESSION['login_id'];

   

    if (isset($_POST['add_username']) && $_POST['add_username'] != '') {
        $groupid = $_SESSION['manage_groupid'];
        $user = $_POST['add_username'];

        $sql = "SELECT id FROM users WHERE username = '$user' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $id = $row['id'];


        $sql = "INSERT INTO group_participants  VALUES ('$id', '$groupid' )";
        if (mysqli_query($db, $sql)) {
            ;
        } else
            $msg_add_user = "Couldn't add user";
    }
    if (isset($_POST['kick_username']) && $_POST['kick_username'] != '') {
        $groupid = $_SESSION['manage_groupid'];
        $user = $_POST['kick_username'];

        $sql = "SELECT id FROM users WHERE username = '$user' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $id = $row['id'];
        
        if ( $myid == $id) $msg_kick_user = " You can't kick yourself" ;
        else
        {
             $sql = "DELETE from group_participants where users_id = '$id' and group_id = '$groupid'";
            if (mysqli_query($db, $sql)) {
                ;
            } else
                $msg_kick_user = "Couldn't kick user";
            }
    }

    if (isset($_POST['description']) && $_POST['description'] != '') {
        $groupid = $_SESSION['manage_groupid'];
        $desc = $_POST['description'];

        $sql = "Update group_details set description = '$desc' where id = '$groupid'";
        if (mysqli_query($db, $sql)) {
            ;
        } else
            $msg_desc = "Couldn't change ";
    }
}
?> 
<!DOCTYPE html>
<html>


    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>

        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/expenses.css">
        <link rel="stylesheet" href="css/style.css">
    </head>


    <body class="page managegroups-page">
        <h2 class="page-title">Manage group</h2>






        <p style="text-align:center;">

            Current users in the group are :
<?php
$ses_group_id = $_SESSION['manage_groupid'];
$result = mysqli_query($db, "SELECT * FROM group_participants");
while ($row = mysqli_fetch_array($result)) {

    $group_id = $row['group_id'];
    $user_id = $row['users_id'];
    if ($group_id == $ses_group_id) {

        $sql = "SELECT firstname, lastname, username from users WHERE id = '$user_id'";
        $result2 = mysqli_query($db, $sql);
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $nickname = $row2['firstname'] . " '" . $row2['username'] . "' " . $row2['lastname'] . " ; ";


        echo $nickname;
    }
}
?>

        </p>



        <p style="text-align:center;">

            All the users :
            <?php
            $ses_group_id = $_SESSION['manage_groupid'];
            $result = mysqli_query($db, "SELECT * FROM users");
            while ($row = mysqli_fetch_array($result)) {


                $nickname = $row['firstname'] . " '" . $row['username'] . "' " . $row['lastname'] . " ; ";


                echo $nickname;
            }
            ?>

        </p>





                <div class="form">
                    <form class="login-form"  name="myForm"  role = "form" 
                          action = "manage_group.php"   method = "post">
                        <input type="text" placeholder="Add user by username: " name="add_username"/> 
                        <a href="manage_group.php">
                            <button>Add</button>
                        </a>
                    </form>



                </div>







            <div class="form">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "manage_group.php"   method = "post">
                    <input type="text" placeholder="Kick user by username: " name="kick_username"/> 
                    <a href="manage_group.php">
                        <button> Kick user</button>
                    </a>
                </form>

            </div>





  

            <div class="form">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "manage_group.php"   method = "post" id="group-description">
                    <input type="text" placeholder="<?= $description ?>" name="description"/> 

                    <button > Change group description</button>


                    <button style="background-color: black" onclick='this.form.action = "groups.php";'> Back</button>

                </form>

            </div>







    </body> 

</html>