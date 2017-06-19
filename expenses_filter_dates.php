<?php
require './test_connection.php';
session_start();
$start = $_GET["start"];
$end   = $_GET["end"] ;
?>
    


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
                width: 50%;
                margin-left: 470px;
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
        <h2 class="page-title" style="color:black">Your expenses between  <?php echo $start ; echo " and " ; echo $end ?></h2>
    </body>
</html>


<?php 

$myid = $_SESSION['login_id'] ;




$result = mysqli_query($db, "SELECT * FROM Expenses where user_id = '$myid' and date >= '$start' and date <= '$end' order by date asc");
$count = mysqli_num_rows($result);
if ( $count == 0 )
    echo "<h2 class=\"page-title\" style=\"color:black\"> No results found!  </h2>\n";
else {
    
echo "    \n";
echo "<table>\n";
echo "  <tr>\n";
echo "    <th>Expense</th>\n";
echo "    <th>Cost</th>\n";
echo "    <th>Date</th>\n";
echo "    \n";
echo "  </tr>\n";
while ($row = mysqli_fetch_array($result)) {
   $expense =  $row['expense'] ;
   $cost =  $row['cost'] ;
   $date = $row['date'] ;
    echo "  <tr>\n";
    echo "  <td> $expense </td>\n";
    echo "  <td> $cost</td>\n";
    echo "  <td>$date</td>\n";
    echo "  </tr>\n";
}

echo "</table>\n";
}
?>