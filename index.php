<!DOCTYPE html>

<?php
require './test_connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {


        if (isset($_POST['pass'])) {
            $error = "";
            $myusername = $_POST["username"]; // check if the username has been set
            $mypassword = md5($_POST["pass"]); // check if the username has been set
        
            
              $sql = "SELECT id,firstname,lastname, city, job, age  FROM users WHERE username = '$myusername' and password = '$mypassword'";
              $result = mysqli_query($db,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             

              $count = mysqli_num_rows($result);
              
           
              // If result matched $myusername and   $mypassword, table row must be 1 row

              if($count == 1) {
             
              $_SESSION['login_user'] = $myusername;
              $_SESSION['login_pass'] = $mypassword;
              $_SESSION['login_id'] = $row['id'];
              $_SESSION['login_firstname'] = $row['firstname'] ;
              $_SESSION['login_lastname'] = $row['lastname'];
              $_SESSION['login_city'] = $row['city'];
              $_SESSION['login_job'] = $row['job'];
              $_SESSION['login_age'] = $row['age'];
               
             
              
              
              
              header("location: login.php");
              }else {
              $error = "Your Username or Password is invalid";
                $_SESSION['message'] = $error;
              }
             
        }
    }
  
}

?> 

<html >
    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>

        <link rel="stylesheet" href="css/style.css">
        <script src="js/index.js"></script>
    </head>

    <body class="page login-page">
        <div class="darkoverlay"></div>

        <div>
            <div class="form">
                <img src="logo.png" alt="Smiley face" align="middle">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "index.php"   method = "post">
                    <input type="text" placeholder="Enter your username here" name="username" />
                    <input type="password" name="pass" placeholder="Enter your password here" />
                    <button>Log in</button>
                    
                        <button class="button-signup" onclick='this.form.action = "signup.php"'  > Not registered? Create an account</button>
                  
                </form>
            </div>
        </div>
    <p style="text-align:center;">  
    <?php 
    if (isset($_SESSION['message'] ) ) {
        echo $_SESSION['message'] ;
    } 
    ?>    
    </p>
    </body>
</html>
