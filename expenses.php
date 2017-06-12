

<?php
require './test_connection.php';
session_start();
      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myid = $_SESSION['login_id'];
    if (isset($_POST['expense']) && $_POST['expense'] !== '' && isset($_POST['cost']) && $_POST['cost'] !== '' && isset($_POST['date']) && $_POST['date'] !== '') {
  
        $group_name = "Personal" ;
        $expense = $_POST["expense"];
        $cost = $_POST["cost"];
        $date = $_POST["date"];
        $myid = $_SESSION['login_id'] ;
        $username = $_SESSION['login_user'];
        $sql = "INSERT INTO Expenses  VALUES ('$myid', '$expense', '$cost','$date', '$group_name', 0 )";
        $result3 = mysqli_query($db, $sql);
        
        
       
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/expenses.css">
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 70%;
                margin-left : 15%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #green;
            }
        </style>
    </head>
    <body class="page expenses-page">     
        <div class="topnav" id="myTopnav">
            <a href="login.php"> Profile </a>
            <a href="groups.php">Groups</a>
            <a href="expenses.php">Expenses</a>
            <a href="reports.php">Reports</a>
            <div class="right">
                <a href="index.php">Sign Out</a>
            </div>
        </div>
        <h2 class="page-title">Expenses</h2>
        <br> <br>
        
          <div class="form">
            <form  name="myForm"  role = "form" 
                  method = "post" action=""> 
                <input type="text" placeholder="Expense" name="expense" required />
                <input type="number" placeholder="Cost" name="cost" required/>
                <input type="text" placeholder="Date in format year-month-day" name="date" required/>
                
                <button> Add Expense </button>
                
            </form>

              <br> <br>

        </div>
        
        
            <?php
           
            $myid =  $_SESSION['login_id']  ;
            echo "    \n";
            echo "<table>\n";
            echo "  <tr>\n";
            echo "    <th>Expense</th>\n";
            echo "    <th>Cost</th>\n";
            echo "    <th>Date</th>\n";
            echo "   <th> Group</th>\n";
            echo "    \n";
            echo "  </tr>\n";

            $result = mysqli_query($db, "SELECT * FROM Expenses where user_id= '$myid' order by date desc");
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['user_id'];
                $expense = $row['expense'];
                $cost = $row['cost'];
                $date = $row['date'];
                   $group_name = $row['group_name'];
                echo "  <tr>\n";
                echo "  <td> $expense</td>\n";
                echo "  <td> $cost</td>\n";
                echo "  <td> $date</td>\n";
                echo "  <td>$group_name</td>\n";
                echo "  </tr>\n";
            }

            echo "</table>\n";
            ?>


            <br> <br>
      







    </body>


</html>
        
        
  