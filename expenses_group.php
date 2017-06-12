<?php
require './test_connection.php';
session_start();
if (!empty($_GET['id'])) {

    $playerid = $_GET['id'];
    echo $playerid;
}
?>


<!DOCTYPE html>
<html>
<head>
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
<body>

<table>
  <tr>
    <th>Username</th>
    <th>Expense</th>
    <th>Cost</th>
    <th>Date</th>
    
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  

</table>
   <p style="text-align:center;">
  <button onclick="window.location.href='groups.php'" style="background-color:grey">Back</button>
   </p>
</body>
</html>



<?php
/*
 * Script de populare EXPENSES!!! *
  $expenses_low = array("Nuts", "banana", "potatoes", "bread", "milk", "chocholate", "Pepsi", "Pencil", "Water", "Paper", "T-Shirt", "Bracelet",
  "Jeans", "Hamburger", "Cigarette", "Coke", "Ball", "Gloves", "Book", "Movie", "Game", "Plant", "Bus Ticket", "Taxi", "Shoes");
  $expenses_mid = array("Plane ticket", "T-Shirt", "Gloves", "Shoes", "Headphones", "Keyboard", "Phone", "Watch", "TV", "Monitor", "Desk", "Jewelery", "Gym", "Suppliments");

  $max = sizeof($expenses_low);
  $max2= sizeof($expenses_mid);
  $ses_group_id = $_SESSION['manage_groupid'];
  $result = mysqli_query($db, "SELECT * FROM group_participants");
  while ($row = mysqli_fetch_array($result)) {

  $group_id = $row['group_id'];
  $user_id = $row['users_id'];



  $sql = "SELECT name from group_details WHERE id = '$group_id'";
  $result3 = mysqli_query($db, $sql);
  $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
  $group_name = $row3['name'] ;


  for ( $i = 1; $i <= 2 ; $i++)
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
  $ses_group_id = $_SESSION['manage_groupid'];
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



  }

 */?>