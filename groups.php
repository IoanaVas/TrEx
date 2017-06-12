<?php
require './test_connection.php';
session_start();
$msg = " ";

/*
  $sql = "CREATE TABLE group_details ( id INT(6) AUTO_INCREMENT PRIMARY KEY, name varchar(50), description varchar(50), creation_date date, user_id INT)" ;
  if (mysqli_query($db, $sql)) {
  echo "succ" ;
  }
  $sql = "CREATE TABLE group_participants ( users_id INT(6), group_id int)" ;
  if (mysqli_query($db, $sql)) ;
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myid = $_SESSION['login_id'];
    if (isset($_POST['group_name']) && $_POST['group_name'] !== '' && isset($_POST['group_description']) && $_POST['group_description'] !== '') {
        $name = $_POST["group_name"];
        $descrip = $_POST["group_description"];
        $date = date('Y-m-d H:i:s');


        $msg_create_group = "";
        
        if ( $name == 'Personal') $msg_create_group = 'Personal is a reserved word, choose another one!' ;
        else
        {




        $sql = "INSERT INTO group_details  VALUES (0, '$name', '$descrip','$date', '$myid' )";
        if (mysqli_query($db, $sql)) {
            ;
        }


        $sql = "SELECT id FROM group_details ORDER BY id DESC LIMIT 1;";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $this_group_id = $row['id'];


        $sql = "INSERT INTO group_participants  VALUES ('$myid', '$this_group_id' )";
        if (mysqli_query($db, $sql)) {
            ;
        }
        header('Location: solve.php');
        }
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body class="page groups-page">
        <div>
            <div class="topnav" id="myTopnav">
                <a href="login.php"> Profile </a>
                <a href="groups.php">Groups</a>
                <a href="expenses.php">Expenses</a>
                <a href="reports.php">Reports</a>
                <div class="right">
                    <a href="logout.php">Sign Out</a>
                </div>
            </div>
            <h2 class="page-title">Your groups</h2>
            <div class="page-content">
            <div class="buttons">
                <button id="button1" onclick="myFunction2(); this.onclick = null;"> Create Group </button>
                <button id="button1" onclick="refresh(); this.onclick = null;">Hide</button
            </div>
            <div id="list5">
                <ul>
                        <?php
                        $mygroups_name_manage = [];
                        $mygroups_id_manage = [];
                        $myid = $_SESSION['login_id'];
                        $result = mysqli_query($db, "SELECT * FROM group_participants");
                        while ($row = mysqli_fetch_array($result)) {
                            $rowid = $row['users_id'];
                            if ($myid == $rowid) {

                                $rowgroupid = $row['group_id'];
                                $sql = "SELECT name FROM group_details where id = '$rowgroupid' ";
                                $result2 = mysqli_query($db, $sql);
                                $rowz = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                $this_group_name = $rowz['name'];
                                echo "<li><div class='text'>" . $this_group_name . "</div>";
                                echo "<div class='buttons'>";
                                echo "<button id=\"button2\" onclick=\";\">Details</button>\n";
                               
                                echo " <a href=\"expenses_group.php?id=$rowgroupid\"> <button> Expenses</button> </a>\n";
                                 
                                echo "<button id=\"button2\" onclick=\";\">Leave</button>\n";
                          
                           

                                $sql = "SELECT user_id FROM  group_details where id = '$rowgroupid'";
                                $result3 = mysqli_query($db, $sql);
                                $rowy = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                                $count = mysqli_num_rows($result3);
                                $this_group_manager = $rowy['user_id'];

                                if ($this_group_manager == $myid) {
                                    //echo "<button id=\"button2\" onclick=\"window.location.href='manage_group.php'\" >Manage</button> \n";
                                    // creare vectori;
                                    array_push($mygroups_name_manage, $this_group_name);
                                    array_push($mygroups_id_manage, $rowgroupid);
                                     //echo " <a href=\"manage_group.php?id=$rowgroupid\"> <button> Manage</button> </a>\n";
                                    
                                }
                                     echo "</div></li>";
                                /*



                                 */
                            }
                        }
                        ?>
                </ul>
            </div>
               
                <?php
               $here = 0 ;
            $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
            if ($option) {
                $here = 1 ;
              
                $manage_group_name = $_POST['taskOption'];
                $max = sizeof($mygroups_name_manage);
                for ($i = 0; $i < $max; $i++) {
                    if ( $mygroups_name_manage[$i] == $manage_group_name)
                    {
                        $_SESSION['manage_groupid'] = $mygroups_id_manage[$i] ;
                       
                    }
                }
            }
            ?>
       
                <form method="post"  action="groups.php" >
                    <select name="taskOption">
                       <?php 
                        $max = sizeof($mygroups_name_manage);
                          for ($i = 0; $i < $max; $i++) 
                                echo "<option>" . $mygroups_name_manage[$i] . " </option>";
                
                       ?>
                    </select>
                    <input class="button" type="submit" value="Select a group first"/>
                </form>
                
              <?php if(isset($_SESSION['manage_groupid'])) { ?>
                <button class="button-manage" id="button2" onclick="window.location.href='manage_group.php'" >Manage</button>
              <?php } ?>

            <p id="familie"> </p>

            <div style="overflow-x:auto;">
                <table id="imagetable" >
                </table>
            </div>

            
            <p style="text-align:center;">

                <?php
                echo $msg;
                if ( isset($msg_create_group))
                    echo $msg_create_group;
                
                
                ?>

            </p>

                <script>

                    function myAjax() {
                        $.ajax({
                            type: "POST",
                            url: 'your_url/ajax.php',
                            data: {action: 'call_this'},
                            success: function (html) {
                                alert(html);
                            }

                        });
                    }
                    function manageCreate()
                    {
                        alert("buna");
<?php echo "sal"; ?>
                    }
                    var contor = 0;

                    function refresh() {
                        contor = 0;
                        location.reload();

                    }
                    function myFunction2() {
                        contor++;

                        if (contor == 1) {
                            var x = document.createElement("FORM");
                            x.setAttribute("id", "myForm");
                            document.body.appendChild(x);

                            var y = document.createElement("INPUT");
                            y.setAttribute("type", "text");
                            y.setAttribute("placeholder", "Name of the group");
                            y.setAttribute("name", "group_name");
                            document.getElementById("myForm").appendChild(y);

                            var y = document.createElement("INPUT");
                            y.setAttribute("type", "text");
                            y.setAttribute("placeholder", "Description");
                            y.setAttribute("name", "group_description");
                            document.getElementById("myForm").appendChild(y);

                            document.getElementById("myForm").setAttribute("method", "post");
                            document.getElementById("myForm").setAttribute("action", "groups.php");
                            document.getElementById("myForm").setAttribute("role", "form");
                            document.getElementById("myForm").setAttribute("align", "center");
                            document.getElementById("myForm").classList.add('form');




                            var x = document.createElement("BUTTON");
                            var t = document.createTextNode("Create Group");
                            x.appendChild(t);
                            document.getElementById("myForm").appendChild(x);
                        }
                    }

                    function tableCreate()
                    {
                        contor++;
                        if (contor == 1)
                        {

                            document.getElementById("familie").innerHTML = ".";
                            var table = document.getElementById("imagetable");

                            var row = table.insertRow(0);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var things = ["Chocolate", "Milk", "Bread", "Soap", "Watch", "Coke", "Perfume", "Perfume"];
                            var users = ["Ioana12", "BogdanD", "CostelNicusor", "AnaMaria1", "DanD", "MateiL", "IoanaV", "Korodescu",
                                "MatcoV", "admin", "Monica22", "Ioana12"];
                            var dimension;

                            cell1.innerHTML = "User";
                            cell1.style.fontStyle = "italic"

                            cell2.innerHTML = "Expense";
                            cell2.style.fontStyle = "italic"


                            cell3.innerHTML = "Cost";
                            cell3.style.fontStyle = "italic"

                            cell4.innerHTML = "Date";
                            cell4.style.fontStyle = "italic"


                            dimension = things.length;

                            for (var i = 1; i < 11; i++)
                            {
                                row = table.insertRow(i);
                                cell1 = row.insertCell(0);
                                cell2 = row.insertCell(1);
                                cell3 = row.insertCell(2);
                                cell4 = row.insertCell(3);


                                cell1.innerHTML = users[Math.floor(Math.random() * users.length) ];

                                position = Math.floor(Math.random() * dimension);
                                cell2.innerHTML = things[position];


                                cell3.innerHTML = Math.floor(Math.random() * 100 + 1);


                                cell4.innerHTML = (Math.floor(Math.random() * 30) + 1) + "/" + (Math.floor(Math.random() * 3) + 1) + "/2017";

                                cell1.style.color = "black";
                                cell2.style.color = "black";
                                cell3.style.color = "black";
                                cell4.style.color = "black";

                            }
                        }
                    }





                </script>
            </div>
    </body> 
</html>