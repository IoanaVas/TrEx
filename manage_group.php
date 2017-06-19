<?php
require './test_connection.php';

session_start();


$msg_add_user = " ";
$msg_kick_user = " ";
$msg_desc = " ";
$msg_new_manager = " ";



$groupid = $_GET['id'];

$sql = "Select description from group_details where id = '$groupid' ";
$result = mysqli_query($db, $sql);
$rowz = mysqli_fetch_array($result, MYSQLI_ASSOC);
$description = $rowz['description'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $myid = $_SESSION['login_id'];



    if (isset($_POST['add_username']) && $_POST['add_username'] != '') {
        $groupid = $_GET['id'];
        $user = $_POST['add_username'];

        $sql = "SELECT id FROM users WHERE username = '$user' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $id = $row['id'];


        $sql = "INSERT INTO group_participants  VALUES ('$id', '$groupid' )";
        if (mysqli_query($db, $sql)) {
            header('Location: solve3.php?id=' . $groupid);
        } else
            $msg_add_user = "Couldn't add user";
    }
    if (isset($_POST['kick_username']) && $_POST['kick_username'] != '') {
        $groupid = $_GET['id'];
        $user = $_POST['kick_username'];

        $sql = "SELECT id FROM users WHERE username = '$user' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $id = $row['id'];

        if ($myid == $id)
            $msg_kick_user = " You can't kick yourself";
        else {
            $sql = "DELETE from group_participants where users_id = '$id' and group_id = '$groupid'";
            if (mysqli_query($db, $sql)) {
                header('Location: solve3.php?id=' . $groupid);
            } else
                $msg_kick_user = "Couldn't kick user";
        }
    }

    if (isset($_POST['description']) && $_POST['description'] != '') {
        $groupid = $_GET['id'];
        $desc = $_POST['description'];

        $sql = "Update group_details set description = '$desc' where id = '$groupid'";
        if (mysqli_query($db, $sql)) {
            header('Location: solve3.php?id=' . $groupid);
        } else
            $msg_desc = "Couldn't change ";
    }


    if (isset($_POST['manager']) && $_POST['manager'] != '') {
        $groupid = $_GET['id'];
        $user = $_POST['manager'];

        $sql = "SELECT id FROM users WHERE username = '$user' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if ($count == 1) {

            $new_manager_id = $row['id'];

            $sql = "Update group_details set user_id = '$new_manager_id' where id = '$groupid'";
            if (mysqli_query($db, $sql)) {
                // see if it's group. If not, add
                $sql = "SELECT * FROM group_participants WHERE users_id = '$new_manager_id' and group_id = '$groupid' ";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);

                if ($count == 0) { // if we don't find him in the group, add him
                    $sql = "INSERT INTO group_participants  VALUES ('$new_manager_id', '$groupid' )" ;

                    if (mysqli_query($db, $sql)) {
                        ;
                    }
                }

                header('Location: groups.php');
            }
        } else
            $msg_new_manager = "Username not found. Couldn't change manager";
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

            All the users :
            <?php
            $ses_group_id = $_GET['id'];
			$sql="SELECT username FROM users";
            $result = mysqli_query($db, $sql);

            echo "<select name='username'>";
            while ($row = mysqli_fetch_array($result)) {

               echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";

            }
            echo "</select>";
            ?>

        </p>





        <div class="form">
            <form class="login-form"  name="myForm"  role = "form" action = ""   method = "post">
                <input type="text" placeholder="Add user by username: " name="add_username"/>
                <a href="manage_group.php">
                    <button>Add</button>
                </a>
            </form>



        </div>







        <div class="form">
            <form class="login-form"  name="myForm"  role = "form"
                  action = ""   method = "post">
                <input type="text" placeholder="Kick user by username: " name="kick_username"/>
                <a href="manage_group.php">
                    <button> Kick user</button>
                </a>
            </form>

        </div>







        <div class="form">
            <form class="login-form"  name="myForm"  role = "form"
                  action = ""   method = "post" id="group-description">
                <input type="text" placeholder="<?= $description ?>" name="description"/>

                <button > Change group description</button>




            </form>

        </div>


        <div class="form">
            <form class="login-form"  name="myForm"  role = "form"
                  action = ""   method = "post" id="group-description">
                <input type="text" placeholder="Insert a new manager by username" name="manager"/>

                <button> Change group manager</button>


                <button style="background-color: black" onclick='this.form.action = "groups.php"'> Back</button>

            </form>

        </div>







    </body>

</html>
