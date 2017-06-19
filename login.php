<?php

require './test_connection.php';

session_start();
     
     $msg="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $myid =  $_SESSION['login_id'] ;
        if (isset($_POST['firstname']) &&  $_POST['firstname'] !== '') {
            
            $newfirstname = $_POST["firstname"]; // check if the username has been set
            $firstname = $_SESSION['login_firstname'];
            $sql = "Update users set firstname = '$newfirstname' where firstname = '$firstname' and id = '$myid' ";
            // $result = mysqli_query($db, $sql);
            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if (mysqli_query($db, $sql)) {
                $_SESSION['login_firstname'] = $newfirstname;
            }
        }
        
        if (isset($_POST['lastname']) &&  $_POST['lastname'] !== '' ) {

           $newlastname = $_POST["lastname"]; // check if the username has been set
            $lastname = $_SESSION['login_lastname'];
          
            // $result = mysqli_query($db, $sql);
            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $sql = "Update users set lastname = '$newlastname' where lastname = '$lastname' and id = '$myid'";
            if (mysqli_query($db, $sql)) {
                $_SESSION['login_lastname'] = $newlastname;
            }
        }
        
         if (isset($_POST['city']) &&  $_POST['city'] !== '' ) {

           $newcity = $_POST["city"]; // check if the username has been set
            $city = $_SESSION['login_city'];
          
            // $result = mysqli_query($db, $sql);
            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $sql = "Update users set city = '$newcity' where city = '$city' and id = '$myid'";
            if (mysqli_query($db, $sql)) {
                $_SESSION['login_city'] = $newcity;
            }
        }
        
        
         if (isset($_POST['job']) &&  $_POST['job'] !== '' ) {

           $newjob = $_POST["job"]; // check if the username has been set
            $job = $_SESSION['login_job'];
          
            // $result = mysqli_query($db, $sql);
            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $sql = "Update users set job = '$newjob' where job = '$job' and id = '$myid'";
            if (mysqli_query($db, $sql)) {
                $_SESSION['login_job'] = $newjob;
            }
        }
        
         if (isset($_POST['age']) &&  $_POST['age'] !== '' ) {

           $newage = $_POST["age"]; // check if the username has been set
            $age = $_SESSION['login_age'];
          
            // $result = mysqli_query($db, $sql);
            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
               $sql = "Update users set age = '$newage' where age = '$age' and id = '$myid'";
            if (mysqli_query($db, $sql)) {
                $_SESSION['login_age'] = $newage;
            }
        }
       
        
         if (isset($_POST['pass']) && $_POST['pass'] !== '') {

            if (isset($_POST['repass']) && $_POST['repass'] !== '') {
                if (isset($_POST['repass2']) && $_POST['repass2'] !== '') {


                    if ($_POST['pass'] !== $_SESSION['login_pass']) {
                        $msg="Password incorrect or new password doesn't match" ;
                    } else {
                        if ($_POST['repass'] == $_POST['repass2']) {
                           
                            $newpass = md5($_POST['repass']); // check if the username has been set
                            $pass = $_SESSION['login_pass'];
                            $msg="Password succesfully changed" ;
                            
                            
                            
                            // $result = mysqli_query($db, $sql);
                            //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $sql = "Update users set password = '$newpass' where password = '$pass' and id = '$myid'";
                            if (mysqli_query($db, $sql)) {
                               $_SESSION['login_pass'] = $newpass;
                            }
                        }
                        else
                            $msg="Password incorrect or new password doesn't match" ;
                       
                    }
                }
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
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body class="page index-page">
        <div class="topnav" id="myTopnav">
            <a href="login.php"> Profile </a>
            <a href="groups.php">Groups</a>
            <a href="expenses.php">Expenses</a>
            <a href="reports.php">Reports</a>
            <div class="right">
                <a href="logout.php">Sign Out</a>
            </div>
        </div>
        <h2 class="page-title"> Welcome,  <?= $_SESSION['login_firstname'] ?>! Here you can check your account details. </h2>
        <div>
            <div>
                <div class="form">
                    <form class="login-form"  name="myForm"  role = "form" 
                          action = "login.php"   method = "post">
                        <input type="text" placeholder="Your first name:  <?= $_SESSION['login_firstname'] ?>" name="firstname"/> 

                        <input type="text" placeholder="Your last name:  <?= $_SESSION['login_lastname'] ?>" name="lastname"/>
                        <input type="text" placeholder="Your job:  <?= $_SESSION['login_job'] ?>" name="job"/>
                        <input type="text" placeholder="Your city:  <?= $_SESSION['login_city'] ?>" name="city"/>
                        <input type="number" placeholder="Your age:  <?= $_SESSION['login_age'] ?>" name="age"/>

                        <a href="login.php">
                            <button>Edit</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>


        <div>
            <div class="form">
                <form class="login-form"  name="myForm"  role = "form" action = "login.php"   method = "post">
                    <input type="password" placeholder="Enter password" name = "pass" required />
                    <input type="password" placeholder="Enter new password" name = "repass" required/>
                    <input type="password" placeholder="Enter new password" name = "repass2" required/>

                    <a href="login.php">
                        <button>Change Password</button>
                    </a>
                </form>
            </div>
        </div>
    </body> 
</html>