<!DOCTYPE html>
<?php
require './test_connection.php';
session_start();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['us']) && isset($_POST['pas']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['city']) && isset($_POST['job']) && isset($_POST['age'])) {



        $error = "";
        $myusername = $_POST["us"]; // check if the username has been set
        $mypassword = $_POST["pas"]; // check if the username has been set
     



        $sql = "SELECT id,firstname,lastname, city, job, age  FROM users WHERE username = '$myusername' ";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


        $count = mysqli_num_rows($result);


        // If result matched $myusername and   $mypassword, table row must be 1 row

        if ($count == 0) {

            $_SESSION['login_user'] = $myusername;
            $_SESSION['login_pass'] = $mypassword;
            $_SESSION['login_firstname'] = $_POST["fname"];
            $myfname = $_POST["fname"]; 
            $_SESSION['login_lastname'] = $_POST["lname"];
            $mylname = $_POST["lname"]; 
            $_SESSION['login_city'] = $_POST["city"];
              $mycity = $_POST["city"]; 
            $_SESSION['login_job'] = $_POST["job"];
               $myjob = $_POST["job"];
            $_SESSION['login_age'] = $_POST["age"];
             $myage = $_POST["age"];

            $generated_id = rand(100,1000) ;
            $sql = "INSERT INTO users  VALUES (0, '$myfname', '$mylname','$mycity', '$myjob', '$myage' , '$myusername', '$mypassword' )";

            if (mysqli_query($db, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);





            header("location: login.php");
        } else {
            $error = "Account already exists";
            $_SESSION['message'] = $error;
        }
    }
}
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

    <body background="login.jpg">


        <div>

            <div class="login-page">

                <div class="form">
                    <form class="login-form"  name="myForm"  role = "form" 
                          method = "post">
                        <img src="logo.png" alt="Smiley face" align="middle">
                        <input type="text" placeholder="Username" name="us" required />
                        <input type="password" placeholder="Enter password" name="pas" required/>
                        <input type="text" placeholder="First name" name="fname" required/>
                        <input type="text" placeholder="Last name" name="lname" required/>
                        <input type="text" placeholder="City" name="city" required/>
                        <input type="text" placeholder="Job" name="job" required/>
                        <input type="number" placeholder="Age" name="age" required/>
                        <button>Submit</button>
                    </form>



                </div>
            </div>
        </div>
        <p style="text-align:center;">

<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];

    session_destroy();
}
?>

        </p>
        <!--  <div class="login-page">
          <div class="form">
            <form class="register-form">
              <input type="text" placeholder="name"/>
              <input type="password" placeholder="password"/>
              <input type="text" placeholder="email address"/>
              <button>create</button>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
           </div>-->


    </body>
</html>
