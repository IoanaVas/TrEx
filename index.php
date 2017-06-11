<!DOCTYPE html>

<?php
require './test_connection.php';

session_start();


?> 





<html >
    <head>
        <meta charset="UTF-8">
        <title>Expense Tracker</title>



        <link rel="stylesheet" href="css/style.css">

        <style>
            body, html {
                height: 100%;
                margin: 0;
            }

            .bg {
                /* The image used */
                background-image: url("login.jpg");

                /* Full height */
                height: 100%; 

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {


        if (isset($_POST['pass'])) {
            $error = "";
            $myusername = $_POST["username"]; // check if the username has been set
            $mypassword = $_POST["pass"]; // check if the username has been set
        
            
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






    <body background="login.jpg">
        <script src="js/index.js"></script>





        <div class="login-page">

            <div class="form">

                <img src="logo.png" alt="Smiley face" align="middle">
                <form class="login-form"  name="myForm"  role = "form" 
                      action = "index.php"   method = "post">
                    <input type="text" placeholder="username" name="username" required/>
                    <input type="password" name="pass" placeholder="password" required/>
                    <button>login</button>

                </form>
                <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
            </div>
        </div>


    </body>
    <p style="text-align:center;">
        
         <?php 
    if (isset($_SESSION['message'] ) )
    {
        echo $_SESSION['message'] ;
    
      
    } 
    ?>
        
    </p>
   
   
</html>
