<?php
require './test_connection.php';

session_start();
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
                width:50%;
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
        <h2 class="page-title" style="color:black"> All the users of the website</h2>
    </body>
</html>



<?php
$myid = $_SESSION['login_id'];




$result = mysqli_query($db, "SELECT * FROM users");




echo "    \n";
echo "<table>\n";
echo "  <tr>\n";
echo "    <th>Username</th>\n";
echo "    <th>Firstname</th>\n";
echo "    <th>Lastname</th>\n";
echo "    <th>City</th>\n";
echo "    \n";
echo "  </tr>\n";

while ($row = mysqli_fetch_array($result)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $city = $row['city'];
    $username = $row['username'];
    echo "  <tr>\n";
    echo "  <td> $username </td>\n";
    echo "  <td> $firstname</td>\n";
    echo "  <td>$lastname</td>\n";
     echo "  <td>$city</td>\n";
    echo "  </tr>\n";
}

echo "</table>\n";

?>