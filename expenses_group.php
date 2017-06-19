<?php
require './test_connection.php';
session_start();
if (!empty($_GET['id'])) {

    $this_group_id = $_GET['id'];
    $sql = "Select name from group_details where id = '$this_group_id' ";
    $result = mysqli_query($db, $sql);
    $rowz = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $groupname = $rowz['name'];
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
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>

    <body >

        <p style="text-align:right;">
            <button onclick="window.location.href = 'groups.php'" style="background-color:grey">Back</button>
        </p>
        
        
        <p style="text-align:center;">

            Current users in the <?php echo $groupname ?>  group are :
            <?php
            $result = mysqli_query($db, "SELECT * FROM group_participants");
            while ($row = mysqli_fetch_array($result)) {

                $group_id = $row['group_id'];
                $user_id = $row['users_id'];
                if ($group_id == $this_group_id) {

                    $sql = "SELECT firstname, lastname, username from users WHERE id = '$user_id'";
                    $result2 = mysqli_query($db, $sql);
                    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                    $nickname = $row2['firstname'] . " '" . $row2['username'] . "' " . $row2['lastname'] . " ; ";


                   echo $nickname;
                }
            }
            ?>






            <?php
            echo "    \n";
            echo "<table>\n";
            echo "  <tr>\n";
            echo "    <th>Username</th>\n";
            echo "    <th>Expense</th>\n";
            echo "    <th>Cost</th>\n";
            echo "    <th>Date</th>\n";
            echo "    \n";
            echo "  </tr>\n";

            $result = mysqli_query($db, "SELECT * FROM Expenses where group_id = '$this_group_id' order by date desc");
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['user_id'];
                $sql = "SELECT username from users WHERE id = '$id'";
                $result3 = mysqli_query($db, $sql);
                $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                $username = $row3['username'];
                $expense = $row['expense'];
                $cost = $row['cost'];
                $date = $row['date'];
                echo "  <tr>\n";
                echo "  <td> $username</td>\n";
                echo "  <td> $expense</td>\n";
                echo "  <td> $cost</td>\n";
                echo "  <td>$date</td>\n";
                echo "  </tr>\n";
            }

            echo "</table>\n";
            ?>


            <br> <br>
     



        </div>


<div class="form">
            <form  name="myForm"  role = "form" 
                  method = "post" action=""> 
                <input type="text" placeholder="Expense" name="expense" required />
                <input type="number" placeholder="Cost" name="cost" required/>
                <input type="date" placeholder="Date in format year-month-day" name="date" required/>
                
                <button> Add Expense </button>
                
            </form>
</div>
          <h2 class="page-title" style="color:black"> Filter the expenses by </h2>
              <div style="display:inline-block; vertical-align: middle; margin-left:650px">
            <button onclick="location.href = 'expenses_group_filter.php?id=1&opt=1&group_id=<?php echo $this_group_id;?>'">Cost Asc</button> &nbsp;
            <button onclick="location.href = 'expenses_group_filter.php?id=1&opt=2&group_id=<?php echo $this_group_id;?>'">Cost Desc</button> &nbsp;
            <button onclick="location.href = 'expenses_group_filter.php?id=2&opt=1&group_id=<?php echo $this_group_id;?>'">Name Asc</button> &nbsp; 
            <button onclick="location.href = 'expenses_group_filter.php?id=2&opt=2&group_id=<?php echo $this_group_id;?>'">Name Desc</button> &nbsp; 
            <button onclick="location.href = 'expenses_group_filter.php?id=3&opt=1&group_id=<?php echo $this_group_id;?>'">Date Asc</button>  &nbsp; 

                 </div>


    </body>


</html>



<?php

      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myid = $_SESSION['login_id'];
    if (isset($_POST['expense']) && $_POST['expense'] !== '' && isset($_POST['cost']) && $_POST['cost'] !== '' && isset($_POST['date']) && $_POST['date'] !== '') {
        $sql = "SELECT name FROM  group_details where id = '$this_group_id'";
        $result3 = mysqli_query($db, $sql);
        $rowy = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $this_group_name = $rowy['name'];
        
        $expense = $_POST["expense"];
        $cost = $_POST["cost"];
        $date = $_POST["date"];
        $myid = $_SESSION['login_id'] ;
        $username = $_SESSION['login_user'];
        $sql = "INSERT INTO Expenses  VALUES ('$myid', '$expense', '$cost','$date', '$this_group_name', '$this_group_id' )";
        if (mysqli_query($db, $sql)) {
            ;
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        header('Location: solve2.php?id='.$this_group_id);
    }
}
?>



<!--
// * Script de populare EXPENSES!!! *

  $expenses_low = array("Nuts", "banana", "potatoes", "bread", "milk", "chocholate", "Pepsi", "Pencil", "Water", "Paper", "T-Shirt", "Bracelet",
  "Jeans", "Hamburger", "Cigarette", "Coke", "Ball", "Gloves", "Book", "Movie", "Game", "Plant", "Bus Ticket", "Taxi", "Shoes");
  $expenses_mid = array("Plane ticket", "T-Shirt", "Gloves", "Shoes", "Headphones", "Keyboard", "Phone", "Watch", "TV", "Monitor", "Desk", "Jewelery", "Gym", "Suppliments");

  $max = sizeof($expenses_low);
  $max2= sizeof($expenses_mid);
  $ses_group_id = $this_group_id;
  $result = mysqli_query($db, "SELECT * FROM group_participants");
  while ($row = mysqli_fetch_array($result)) {

  $group_id = $row['group_id'];
  $user_id = $row['users_id'];



  $sql = "SELECT name from group_details WHERE id = '$group_id'";
  $result3 = mysqli_query($db, $sql);
  $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
  $group_name = $row3['name'] ;


  for ( $i = 1; $i <= 6 ; $i++)
  {
  $val = rand(1,$max-1);
  $expense = $expenses_low[$val] ;

  $val = rand(1,$max2-1);
  $expense2 = $expenses_mid[$val];

  $cost = rand(1,10);
  $cost2 = rand(30,100);

  $chance= rand(1,2);

  $year = 2016;
  if ( $chance == 2) { $expense = $expense2; $cost = $cost2; $year=2017; }



  //Generate a random month.
  $month= mt_rand(1, 12);

  //Generate a random day.
  $day= mt_rand(1, 28);

  //Using the Y-M-D format.
  $randomDate = $year . "-" . $month . "-" . $day;






  $sql = "INSERT INTO Expenses  VALUES ('$user_id', '$expense', '$cost','$randomDate', '$group_name' , '$group_id')";

  if (mysqli_query($db, $sql)) {
  echo "New record created successfully";
  } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  }



  }





  $max = sizeof($expenses_low);
  $max2= sizeof($expenses_mid);
  $ses_group_id = $this_group_id;
  $result = mysqli_query($db, "SELECT * FROM users");
  while ($row = mysqli_fetch_array($result)) {


  $user_id = $row['id'];
  $group_name = 'Personal' ;


  for ( $i = 1; $i <= 8 ; $i++)
  {
  $val = rand(1,$max-1);
  $expense = $expenses_low[$val] ;

  $val = rand(1,$max2-1);
  $expense2 = $expenses_mid[$val];

  $cost = rand(1,10);
  $cost2 = rand(30,100);

  $chance= rand(1,2);

  $year = 2016;
  if ( $chance == 2) { $expense = $expense2; $cost = $cost2; $year=2017; }



  //Generate a random month.
  $month= mt_rand(1, 12);

  //Generate a random day.
  $day= mt_rand(1, 28);

  //Using the Y-M-D format.
  $randomDate = $year . "-" . $month . "-" . $day;






  $sql = "INSERT INTO Expenses  VALUES ('$user_id', '$expense', '$cost','$randomDate', '$group_name', 0 )";

  if (mysqli_query($db, $sql)) {
  echo "New record created successfully";
  } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  }



  }-->

