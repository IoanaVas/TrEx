<?php
require './test_connection.php';
session_start();
if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    if ($id == 1)
        $var = "cost";
    else
    if ($id == 2)
        $var = "expense";
    else
    if ($id == 3)
        $var = "date";

    $order_by = $_GET['opt'];

    if ($order_by == 1)
        $order_by = "asc";
    else
        $order_by = "desc";


    $group_id = $_GET['group_id'];
   
}
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
        <h2 class="page-title" style="color:black">Expenses ordered by <?php echo $var ; echo "  " ; echo $order_by ?></h2> 
    </body>
</html>


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

$result = mysqli_query($db, "SELECT * FROM Expenses where group_id = '$group_id' order by $var $order_by");
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
